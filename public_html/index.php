<?php
declare(strict_types=1);

// PHP built-in server: serve static files directly
if (php_sapi_name() === 'cli-server') {
    $static = __DIR__ . parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
    if (is_file($static)) {
        return false;
    }
}

define('ROOT', __DIR__);
define('SITE_NAME', 'Hewlett Computer Service');
define('SITE_URL', 'https://hewlettcomputerservice.us');
define('SITE_EMAIL', 'support@hewlettcomputerservice.us');
define('SITE_PHONE', '(205) 649-4627');
define('SITE_PHONE_RAW', '+12056494627');
define('SITE_ADDRESS', '2634 Cove Court, Vista, CA 92081-8701, US');

session_start();

require_once ROOT . '/includes/helpers.php';

// Parse URL path
$request_uri = $_SERVER['REQUEST_URI'] ?? '/';
$path = parse_url($request_uri, PHP_URL_PATH);
$path = rtrim($path, '/') ?: '/';

// Admin logout
if ($path === '/admin/logout') {
    $_SESSION = [];
    session_destroy();
    header('Location: /admin');
    exit;
}

// Handle API endpoints
if (str_starts_with($path, '/api/')) {
    $api_file = ROOT . '/api/' . basename($path) . '.php';
    if (file_exists($api_file)) {
        require_once $api_file;
        exit;
    }
    http_response_code(404);
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'message' => 'Endpoint not found']);
    exit;
}

// Service slugs
$service_slugs = [
    'computers-printers', 'wifi-network', 'smart-home-iot',
    'audio-video', 'tv-mounting', 'home-security',
    'mobile-devices', 'handyman',
];

// Route map
$routes = [
    '/'                   => 'home',
    '/about'              => 'about',
    '/services'           => 'services-index',
    '/membership'         => 'membership',
    '/partners'           => 'partners',
    '/faq'                => 'faq',
    '/contact'            => 'contact',
    '/book'               => 'book',
    '/book/confirmation'  => 'book-confirmation',
    '/privacy'            => 'privacy',
    '/terms'              => 'terms',
    '/cookie-policy'      => 'cookie-policy',
    '/disclaimer'         => 'disclaimer',
    '/cancellation-policy'=> 'cancellation-policy',
    '/eula'               => 'eula',
    '/uninstall'          => 'uninstall',
    '/opt-in-opt-out'     => 'opt-in-opt-out',
    '/admin'              => 'admin-login',
    '/admin/leads'        => 'admin-leads',
    '/admin/contacts'     => 'admin-contacts',
    '/404'                => '404',
];

// Determine page
$page = null;
$service_slug = null;

if (isset($routes[$path])) {
    $page = $routes[$path];
} elseif (str_starts_with($path, '/services/')) {
    $slug = substr($path, strlen('/services/'));
    if (in_array($slug, $service_slugs, true)) {
        $page = 'service-detail';
        $service_slug = $slug;
    }
}

// 404
if ($page === null) {
    http_response_code(404);
    $page = '404';
}

// Serve page
$page_file = ROOT . '/pages/' . $page . '.php';
if (!file_exists($page_file)) {
    http_response_code(404);
    $page_file = ROOT . '/pages/404.php';
}

require_once $page_file;
