<?php
declare(strict_types=1);
define('ROOT', dirname(__DIR__));
require_once ROOT . '/includes/helpers.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    json_response(false, 'Method not allowed.', [], 405);
}

// Stricter rate limit for partner applications: 2 per 600s
if (rate_limit('partners', 2, 600)) {
    json_response(false, 'Too many requests. Please try again later.', [], 429);
}

if (!csrf_verify($_POST['csrf_token'] ?? '')) {
    json_response(false, 'Invalid request.', [], 403);
}

// Honeypot
if (!empty($_POST['hp_website'])) {
    json_response(true, 'Application submitted!');
}

// Validate
$errors = [];
$company      = sanitize($_POST['company'] ?? '');
$contact_name = sanitize($_POST['contact_name'] ?? '');
$email        = sanitize($_POST['email'] ?? '');
$phone        = sanitize($_POST['phone'] ?? '');
$region       = sanitize($_POST['region'] ?? '');
$services     = sanitize($_POST['services_offered'] ?? '');
$message      = sanitize($_POST['message'] ?? '');

if (empty($company) || strlen($company) < 2)           $errors['company']      = 'Company name is required.';
if (empty($contact_name) || strlen($contact_name) < 2) $errors['contact_name'] = 'Contact name is required.';
if (empty($email) || !valid_email($email))              $errors['email']        = 'Valid business email is required.';

// Block free email domains for partner applications
$free_domains = ['gmail.com','yahoo.com','hotmail.com','outlook.com','aol.com'];
$email_domain = strtolower(substr($email, strrpos($email, '@') + 1));
if (in_array($email_domain, $free_domains)) {
    $errors['email'] = 'Please use your business email address for partner applications.';
}

if (!empty($errors)) {
    json_response(false, 'Please correct the errors below.', ['errors' => $errors], 422);
}

// Save to DB
try {
    require_once ROOT . '/includes/db.php';
    $pdo = get_db();
    $stmt = $pdo->prepare('INSERT INTO partners_applications (company, contact_name, email, phone, region, services_offered, message) VALUES (?, ?, ?, ?, ?, ?, ?)');
    $stmt->execute([$company, $contact_name, $email, $phone, $region, $services, $message]);
} catch (Exception $e) {
    error_log('Partners DB error: ' . $e->getMessage());
}

// Notification
try {
    require_once ROOT . '/includes/mailer.php';
    $admin_body = mail_template('New Partner Application — ' . $company, "
        <p>A new partner program application has been submitted.</p>
        <div class='info-box'>
            <p><strong class='highlight'>Company:</strong> {$company}</p>
            <p><strong class='highlight'>Contact:</strong> {$contact_name}</p>
            <p><strong class='highlight'>Email:</strong> {$email}</p>
            <p><strong class='highlight'>Phone:</strong> " . ($phone ?: 'Not provided') . "</p>
            <p><strong class='highlight'>Region:</strong> " . ($region ?: 'Not provided') . "</p>
            <p><strong class='highlight'>Services:</strong> " . ($services ?: 'Not provided') . "</p>
        </div>
        " . ($message ? "<p><strong class='highlight'>Message:</strong></p><div class='info-box'><p>" . nl2br(htmlspecialchars($message)) . "</p></div>" : '') . "
    ");
    send_mail('support@hewlettcomputerservice.us', 'Hewlett CS Support', 'New Partner Application: ' . $company, $admin_body);

    $cust_body = mail_template('Partner Application Received — Hewlett Computer Service', "
        <p>Hi <strong class='highlight'>{$contact_name}</strong>,</p>
        <p>Thank you for applying to the Hewlett Computer Service Partner Program. We've received your application for <strong class='highlight'>{$company}</strong>.</p>
        <p>Our partnerships team will review your application and reach out within <strong class='highlight'>2 business days</strong> to discuss next steps.</p>
        <div class='info-box'>
            <p>In the meantime, feel free to review our partner program details at <a href='https://hewlettcomputerservice.us/partners' style='color:#0EA5E9'>hewlettcomputerservice.us/partners</a></p>
        </div>
        <p>Questions? Contact us at <a href='mailto:support@hewlettcomputerservice.us' style='color:#0EA5E9'>support@hewlettcomputerservice.us</a></p>
    ");
    send_mail($email, $contact_name, 'Partner Application Received — Hewlett Computer Service', $cust_body);
} catch (Exception $e) {
    error_log('Partners mailer error: ' . $e->getMessage());
}

json_response(true, 'Application submitted! We\'ll review it and reach out within 2 business days.');
