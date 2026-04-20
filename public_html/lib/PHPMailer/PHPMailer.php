<?php
/**
 * PHPMailer - PHP email creation and transport class.
 * STUB FILE — Replace with actual PHPMailer from https://github.com/PHPMailer/PHPMailer
 * Download src/PHPMailer.php, src/SMTP.php, src/Exception.php and place them here.
 */
namespace PHPMailer\PHPMailer;

class PHPMailer {
    const ENCRYPTION_STARTTLS = 'tls';
    const ENCRYPTION_SMTPS    = 'ssl';

    public bool   $SMTPAuth   = true;
    public string $Host       = '';
    public string $Username   = '';
    public string $Password   = '';
    public string $SMTPSecure = 'tls';
    public int    $Port       = 587;
    public string $CharSet    = 'UTF-8';
    public int    $Timeout    = 30;
    public string $Subject    = '';
    public string $Body       = '';
    public string $AltBody    = '';
    public string $ErrorInfo  = '';

    public function isSMTP(): void {}
    public function isHTML(bool $isHtml = true): void {}
    public function setFrom(string $address, string $name = ''): bool { return true; }
    public function addAddress(string $address, string $name = ''): bool { return true; }
    public function addReplyTo(string $address, string $name = ''): bool { return true; }

    public function send(): bool {
        // STUB: actual PHPMailer not installed.
        // Copy PHPMailer source files to lib/PHPMailer/ to enable email sending.
        error_log('PHPMailer stub: email would have been sent to: ' . $this->Username);
        return true;
    }
}
