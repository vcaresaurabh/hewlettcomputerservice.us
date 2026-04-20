<?php
declare(strict_types=1);
define('ROOT', dirname(__DIR__));
require_once ROOT . '/includes/helpers.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    json_response(false, 'Method not allowed.', [], 405);
}

if (rate_limit('newsletter', 5, 300)) {
    json_response(false, 'Too many requests. Please try again later.', [], 429);
}

if (!csrf_verify($_POST['csrf_token'] ?? '')) {
    json_response(false, 'Invalid request.', [], 403);
}

// Honeypot
if (!empty($_POST['hp_email'])) {
    json_response(true, 'Subscribed!');
}

$email = sanitize($_POST['email'] ?? '');
if (!valid_email($email)) {
    json_response(false, 'Please enter a valid email address.', [], 422);
}

try {
    require_once ROOT . '/includes/db.php';
    $pdo = get_db();
    // Check if already subscribed
    $stmt = $pdo->prepare('SELECT id, unsubscribed_at FROM newsletter_subscribers WHERE email = ?');
    $stmt->execute([$email]);
    $existing = $stmt->fetch();

    if ($existing) {
        if ($existing['unsubscribed_at']) {
            // Resubscribe
            $pdo->prepare('UPDATE newsletter_subscribers SET unsubscribed_at = NULL WHERE email = ?')->execute([$email]);
            json_response(true, 'You\'ve been resubscribed. Welcome back!');
        } else {
            json_response(true, 'You\'re already subscribed!');
        }
    }

    $pdo->prepare('INSERT INTO newsletter_subscribers (email) VALUES (?)')->execute([$email]);
} catch (Exception $e) {
    error_log('Newsletter DB error: ' . $e->getMessage());
    json_response(false, 'Something went wrong. Please try again.', [], 500);
}

// Welcome email
try {
    require_once ROOT . '/includes/mailer.php';
    $body = mail_template('Welcome to the Hewlett Newsletter!', "
        <p>Thanks for subscribing to the Hewlett Computer Service newsletter!</p>
        <p>You'll receive:</p>
        <ul style='color:#94a3b8;padding-left:20px;line-height:1.8'>
            <li>Tech tips and how-to guides</li>
            <li>New service announcements</li>
            <li>Exclusive subscriber discounts</li>
            <li>Smart home and security news</li>
        </ul>
        <p>We send emails monthly at most — no spam, guaranteed.</p>
        <p>Want to book a service now?</p>
        <a href='https://hewlettcomputerservice.us/book' class='btn'>Book a Service</a>
        <p style='margin-top:20px;font-size:12px;color:#475569'>To unsubscribe, reply with 'Unsubscribe' or click the link in any email.</p>
    ");
    send_mail($email, 'Subscriber', 'Welcome to the Hewlett Computer Service Newsletter', $body);
} catch (Exception $e) {
    error_log('Newsletter welcome email error: ' . $e->getMessage());
}

json_response(true, 'Subscribed! Watch your inbox for a welcome email.');
