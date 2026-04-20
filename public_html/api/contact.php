<?php
declare(strict_types=1);
define('ROOT', dirname(__DIR__));
require_once ROOT . '/includes/helpers.php';

// Method check
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    json_response(false, 'Method not allowed.', [], 405);
}

// Rate limit: 3 per 300s
if (rate_limit('contact', 3, 300)) {
    json_response(false, 'Too many requests. Please try again in a few minutes.', [], 429);
}

// CSRF
if (!csrf_verify($_POST['csrf_token'] ?? '')) {
    json_response(false, 'Invalid request. Please refresh and try again.', [], 403);
}

// Honeypot
if (!empty($_POST['hp_field'])) {
    json_response(true, 'Message sent! We\'ll be in touch shortly.'); // Silent pass for bots
}

// Validate
$errors = [];
$name    = sanitize($_POST['name'] ?? '');
$email   = sanitize($_POST['email'] ?? '');
$phone   = sanitize($_POST['phone'] ?? '');
$country = sanitize($_POST['country'] ?? '');
$subject = sanitize($_POST['subject'] ?? '');
$message = sanitize($_POST['message'] ?? '');

if (empty($name) || strlen($name) < 2)        $errors['name']    = 'Name must be at least 2 characters.';
if (empty($email) || !valid_email($email))     $errors['email']   = 'Please enter a valid email address.';
if (empty($subject))                           $errors['subject'] = 'Please select a subject.';
if (empty($message) || strlen($message) < 10)  $errors['message'] = 'Message must be at least 10 characters.';
if (strlen($name) > 150)                       $errors['name']    = 'Name is too long.';
if (strlen($message) > 5000)                   $errors['message'] = 'Message is too long (max 5000 characters).';

if (!empty($errors)) {
    json_response(false, 'Please correct the errors below.', ['errors' => $errors], 422);
}

// Save to DB
try {
    require_once ROOT . '/includes/db.php';
    $pdo = get_db();
    $stmt = $pdo->prepare('INSERT INTO contacts (name, email, phone, country, subject, message) VALUES (?, ?, ?, ?, ?, ?)');
    $stmt->execute([$name, $email, $phone, $country, $subject, $message]);
} catch (Exception $e) {
    error_log('Contact DB error: ' . $e->getMessage());
    // Still try to send email even if DB fails
}

// Send notification email to admin
try {
    require_once ROOT . '/includes/mailer.php';
    $body = mail_template('New Contact Form Submission', "
        <p>A new contact form submission has been received.</p>
        <div class='info-box'>
            <p><strong class='highlight'>Name:</strong> {$name}</p>
            <p><strong class='highlight'>Email:</strong> {$email}</p>
            <p><strong class='highlight'>Phone:</strong> " . ($phone ?: 'Not provided') . "</p>
            <p><strong class='highlight'>Country:</strong> " . ($country ?: 'Not provided') . "</p>
            <p><strong class='highlight'>Subject:</strong> {$subject}</p>
        </div>
        <p><strong class='highlight'>Message:</strong></p>
        <div class='info-box'><p>" . nl2br(htmlspecialchars($message)) . "</p></div>
    ");
    send_mail('support@hewlettcomputerservice.us', 'Hewlett CS Support', 'New Contact: ' . $subject, $body);

    // Auto-reply to customer
    $reply = mail_template('We received your message!', "
        <p>Hi <strong class='highlight'>{$name}</strong>,</p>
        <p>Thank you for reaching out to Hewlett Computer Service. We've received your message and will respond within <strong class='highlight'>24 hours</strong> during business hours.</p>
        <div class='info-box'>
            <p><strong>Subject:</strong> {$subject}</p>
            <p><strong>Reference:</strong> " . date('YmdHi') . "-CONTACT</p>
        </div>
        <p>If your issue is urgent, please call us at <strong class='highlight'>(205) 649-4627</strong>. We're available 9am–8pm PT, 7 days a week.</p>
        <a href='https://hewlettcomputerservice.us/faq' class='btn'>Browse FAQs</a>
    ");
    send_mail($email, $name, 'We received your message — Hewlett Computer Service', $reply);
} catch (Exception $e) {
    error_log('Contact mailer error: ' . $e->getMessage());
}

json_response(true, 'Message sent! We\'ll be in touch within 24 hours.');
