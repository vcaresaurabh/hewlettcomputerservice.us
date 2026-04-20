<?php
declare(strict_types=1);
define('ROOT', dirname(__DIR__));
require_once ROOT . '/includes/helpers.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    json_response(false, 'Method not allowed.', [], 405);
}

if (rate_limit('book', 5, 60)) {
    json_response(false, 'Too many requests. Please try again in a few minutes.', [], 429);
}

if (!csrf_verify($_POST['csrf_token'] ?? '')) {
    json_response(false, 'Invalid request. Please refresh and try again.', [], 403);
}

// Validate
$errors = [];
$valid_slugs = ['computers-printers','wifi-network','smart-home-iot','audio-video','tv-mounting','home-security','mobile-devices','handyman'];

$service_slug  = sanitize($_POST['service'] ?? '');
$service_name  = sanitize($_POST['service_name'] ?? '');
$preferred_date= sanitize($_POST['preferred_date'] ?? '');
$preferred_time= sanitize($_POST['preferred_time'] ?? '');
$notes         = sanitize($_POST['notes'] ?? '');
$name          = sanitize($_POST['name'] ?? '');
$email         = sanitize($_POST['email'] ?? '');
$phone         = sanitize($_POST['phone'] ?? '');
$country       = sanitize($_POST['country'] ?? '');
$address       = sanitize($_POST['address'] ?? '');

if (!in_array($service_slug, $valid_slugs))      $errors['service']       = 'Please select a valid service.';
if (empty($preferred_date))                       $errors['preferred_date'] = 'Please select a date.';
if (empty($preferred_time))                       $errors['preferred_time'] = 'Please select a time slot.';
if (empty($name) || strlen($name) < 2)            $errors['name']           = 'Name is required.';
if (empty($email) || !valid_email($email))        $errors['email']          = 'Valid email is required.';
if (empty($country))                              $errors['country']        = 'Please select your country.';

// Date must be today or in future
if (!empty($preferred_date)) {
    $date_ts = strtotime($preferred_date);
    $today   = strtotime(date('Y-m-d'));
    if ($date_ts === false || $date_ts < $today) {
        $errors['preferred_date'] = 'Please select a valid future date.';
    }
}

if (!empty($errors)) {
    json_response(false, 'Please correct the errors below.', ['errors' => $errors], 422);
}

$booking_ref = generate_booking_ref();

// Save to DB
try {
    require_once ROOT . '/includes/db.php';
    $pdo = get_db();
    $stmt = $pdo->prepare('INSERT INTO bookings (booking_ref, service_category, preferred_date, preferred_time, name, email, phone, country, address, notes) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
    $stmt->execute([
        $booking_ref,
        $service_name ?: $service_slug,
        $preferred_date,
        $preferred_time,
        $name,
        $email,
        $phone,
        $country,
        $address,
        $notes,
    ]);
} catch (Exception $e) {
    error_log('Book DB error: ' . $e->getMessage());
}

// Send notification to admin
try {
    require_once ROOT . '/includes/mailer.php';
    $admin_body = mail_template('New Booking — ' . $booking_ref, "
        <p>A new service booking has been submitted.</p>
        <div class='info-box'>
            <p><strong class='highlight'>Booking Ref:</strong> {$booking_ref}</p>
            <p><strong class='highlight'>Service:</strong> " . ($service_name ?: $service_slug) . "</p>
            <p><strong class='highlight'>Date:</strong> {$preferred_date}</p>
            <p><strong class='highlight'>Time:</strong> {$preferred_time}</p>
            <p><strong class='highlight'>Customer:</strong> {$name}</p>
            <p><strong class='highlight'>Email:</strong> {$email}</p>
            <p><strong class='highlight'>Phone:</strong> " . ($phone ?: 'Not provided') . "</p>
            <p><strong class='highlight'>Country:</strong> {$country}</p>
            <p><strong class='highlight'>Address:</strong> " . ($address ?: 'Not provided') . "</p>
        </div>
        " . ($notes ? "<p><strong class='highlight'>Notes:</strong></p><div class='info-box'><p>" . nl2br(htmlspecialchars($notes)) . "</p></div>" : '') . "
    ");
    send_mail('support@hewlettcomputerservice.us', 'Hewlett CS Support', 'New Booking: ' . $booking_ref . ' — ' . ($service_name ?: $service_slug), $admin_body);

    // Customer confirmation
    $cust_body = mail_template('Booking Confirmed — ' . $booking_ref, "
        <p>Hi <strong class='highlight'>{$name}</strong>,</p>
        <p>Your booking has been received and is being processed. Here are your booking details:</p>
        <div class='info-box'>
            <p><strong class='highlight'>Booking Reference:</strong> {$booking_ref}</p>
            <p><strong class='highlight'>Service:</strong> " . ($service_name ?: $service_slug) . "</p>
            <p><strong class='highlight'>Date:</strong> {$preferred_date}</p>
            <p><strong class='highlight'>Time:</strong> {$preferred_time}</p>
        </div>
        <p>Our team will contact you within <strong class='highlight'>1 hour</strong> during business hours to confirm your technician assignment and provide any pre-appointment instructions.</p>
        <p>Need to make changes? Call us at <strong class='highlight'>(205) 649-4627</strong> or reply to this email.</p>
        <a href='https://hewlettcomputerservice.us/faq' class='btn'>Prepare for Your Visit</a>
    ");
    send_mail($email, $name, 'Booking Confirmed: ' . $booking_ref . ' — Hewlett Computer Service', $cust_body);
} catch (Exception $e) {
    error_log('Book mailer error: ' . $e->getMessage());
}

json_response(true, 'Booking confirmed!', ['booking_ref' => $booking_ref]);
