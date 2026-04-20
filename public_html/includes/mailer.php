<?php
declare(strict_types=1);

require_once ROOT . '/lib/PHPMailer/PHPMailer.php';
require_once ROOT . '/lib/PHPMailer/SMTP.php';
require_once ROOT . '/lib/PHPMailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function send_mail(
    string $to_email,
    string $to_name,
    string $subject,
    string $html_body,
    string $text_body = ''
): bool {
    $config_file = ROOT . '/config/config.php';
    if (!file_exists($config_file)) {
        error_log('Mailer: config/config.php not found');
        return false;
    }
    $cfg = require $config_file;

    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host       = $cfg['smtp_host'] ?? 'smtp.hostinger.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = $cfg['smtp_user'] ?? '';
        $mail->Password   = $cfg['smtp_pass'] ?? '';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = (int)($cfg['smtp_port'] ?? 587);
        $mail->CharSet    = 'UTF-8';
        $mail->Timeout    = 15;

        $mail->setFrom($cfg['smtp_from'] ?? SITE_EMAIL, SITE_NAME);
        $mail->addAddress($to_email, $to_name);
        $mail->addReplyTo(SITE_EMAIL, SITE_NAME);

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $html_body;
        $mail->AltBody = $text_body ?: strip_tags($html_body);

        $mail->send();
        return true;
    } catch (Exception $e) {
        error_log('PHPMailer error: ' . $mail->ErrorInfo);
        return false;
    }
}

function mail_template(string $title, string $body_html): string {
    return <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>{$title}</title>
<style>
body{margin:0;padding:0;background:#080B12;font-family:Inter,system-ui,sans-serif;color:#cbd5e1}
.wrap{max-width:600px;margin:40px auto;background:#0F1724;border:1px solid #1E2D42;border-radius:16px;overflow:hidden}
.header{background:linear-gradient(135deg,#0EA5E9,#6366F1);padding:32px 40px;text-align:center}
.header h1{margin:0;font-size:22px;color:#fff;font-weight:700}
.body{padding:40px}
.body p{margin:0 0 16px;line-height:1.7;color:#94a3b8}
.body .highlight{color:#0EA5E9;font-weight:600}
.info-box{background:#141D2B;border:1px solid #1E2D42;border-radius:12px;padding:20px;margin:20px 0}
.info-box p{margin:0;font-size:13px}
.footer{padding:24px 40px;border-top:1px solid #1E2D42;text-align:center}
.footer p{margin:0;font-size:12px;color:#475569}
.btn{display:inline-block;background:linear-gradient(135deg,#0EA5E9,#6366F1);color:#fff;padding:12px 28px;border-radius:10px;text-decoration:none;font-weight:600;font-size:14px;margin-top:16px}
</style>
</head>
<body>
<div class="wrap">
  <div class="header"><h1>Hewlett Computer Service</h1></div>
  <div class="body">{$body_html}</div>
  <div class="footer">
    <p>&copy; 2024 Hewlett Computer Service &bull; 2634 Cove Court, Vista, CA 92081 &bull; <a href="mailto:support@hewlettcomputerservice.us" style="color:#0EA5E9">support@hewlettcomputerservice.us</a></p>
  </div>
</div>
</body>
</html>
HTML;
}
