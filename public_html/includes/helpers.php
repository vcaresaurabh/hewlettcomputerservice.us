<?php
declare(strict_types=1);

/**
 * Escape output for HTML context
 */
function e(mixed $value): string {
    return htmlspecialchars((string)$value, ENT_QUOTES | ENT_HTML5, 'UTF-8');
}

/**
 * Asset URL with cache-busting
 */
function asset(string $path): string {
    $file = ROOT . '/' . ltrim($path, '/');
    $mtime = file_exists($file) ? filemtime($file) : time();
    return '/' . ltrim($path, '/') . '?v=' . $mtime;
}

/**
 * Site URL builder
 */
function url(string $path = ''): string {
    return SITE_URL . '/' . ltrim($path, '/');
}

/**
 * Generate CSRF token
 */
function csrf_token(): string {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

/**
 * Verify CSRF token
 */
function csrf_verify(string $token): bool {
    return !empty($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

/**
 * Get old form input value
 */
function old(string $key, string $default = ''): string {
    return e($_SESSION['old'][$key] ?? $default);
}

/**
 * Redirect to URL
 */
function redirect(string $url, int $code = 302): never {
    http_response_code($code);
    header('Location: ' . $url);
    exit;
}

/**
 * Rate limiting — IP-based using session/file
 * Returns true if rate limit exceeded
 */
function rate_limit(string $key, int $max_requests, int $window_seconds): bool {
    $cache_dir = sys_get_temp_dir() . '/hcs_rl';
    if (!is_dir($cache_dir)) {
        @mkdir($cache_dir, 0700, true);
    }

    $ip = $_SERVER['HTTP_CF_CONNECTING_IP']
        ?? $_SERVER['HTTP_X_FORWARDED_FOR']
        ?? $_SERVER['REMOTE_ADDR']
        ?? 'unknown';
    $ip = preg_replace('/[^a-f0-9:.]/', '', explode(',', $ip)[0]);

    $cache_file = $cache_dir . '/' . md5($key . '_' . $ip) . '.json';
    $now = time();

    $data = ['count' => 0, 'window_start' => $now];
    if (file_exists($cache_file)) {
        $raw = @file_get_contents($cache_file);
        if ($raw) {
            $data = json_decode($raw, true) ?: $data;
        }
    }

    if (($now - $data['window_start']) >= $window_seconds) {
        $data = ['count' => 0, 'window_start' => $now];
    }

    $data['count']++;
    @file_put_contents($cache_file, json_encode($data), LOCK_EX);

    return $data['count'] > $max_requests;
}

/**
 * JSON response helper
 */
function json_response(bool $success, string $message, array $data = [], int $code = 200): never {
    http_response_code($code);
    header('Content-Type: application/json');
    echo json_encode(['success' => $success, 'message' => $message, ...$data]);
    exit;
}

/**
 * Sanitize string input
 */
function sanitize(string $input): string {
    return trim(strip_tags($input));
}

/**
 * Validate email
 */
function valid_email(string $email): bool {
    return (bool) filter_var($email, FILTER_VALIDATE_EMAIL);
}

/**
 * Generate booking reference
 */
function generate_booking_ref(): string {
    return 'HCS' . strtoupper(substr(bin2hex(random_bytes(4)), 0, 8));
}

/**
 * Active nav link helper
 */
function nav_active(string $path): string {
    $current = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
    return $current === $path ? 'text-accent-400' : 'text-slate-400 hover:text-white';
}

/**
 * Service icon SVG by slug
 */
function service_icon(string $slug, string $classes = 'w-6 h-6'): string {
    $icons = [
        'computers-printers' => '<svg class="' . e($classes) . '" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0H3" /></svg>',
        'wifi-network' => '<svg class="' . e($classes) . '" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M8.288 15.038a5.25 5.25 0 017.424 0M5.106 11.856c3.807-3.808 9.98-3.808 13.788 0M1.924 8.674c5.565-5.565 14.587-5.565 20.152 0M12.53 18.22l-.53.53-.53-.53a.75.75 0 011.06 0z" /></svg>',
        'smart-home-iot' => '<svg class="' . e($classes) . '" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" /></svg>',
        'audio-video' => '<svg class="' . e($classes) . '" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M6 20.25h12m-7.5-3v3m3-3v3m-10.125-3h17.25c.621 0 1.125-.504 1.125-1.125V4.875c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125z" /></svg>',
        'tv-mounting' => '<svg class="' . e($classes) . '" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M6 20.25h12m-7.5-3v3m3-3v3m-10.125-3h17.25c.621 0 1.125-.504 1.125-1.125V4.875c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125z" /><path stroke-linecap="round" stroke-linejoin="round" d="M12 12v.01" /></svg>',
        'home-security' => '<svg class="' . e($classes) . '" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" /></svg>',
        'mobile-devices' => '<svg class="' . e($classes) . '" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" /></svg>',
        'handyman' => '<svg class="' . e($classes) . '" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M11.42 15.17L17.25 21A2.652 2.652 0 0021 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 11-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 004.486-6.336l-3.276 3.277a3.004 3.004 0 01-2.25-2.25l3.276-3.276a4.5 4.5 0 00-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437l1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008z" /></svg>',
        'website-seo' => '<svg class="' . e($classes) . '" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418" /></svg>',
    ];
    return $icons[$slug] ?? $icons['computers-printers'];
}
