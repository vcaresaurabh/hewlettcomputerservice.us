<?php
declare(strict_types=1);

function get_db(): PDO {
    static $pdo = null;
    if ($pdo === null) {
        $config_file = ROOT . '/config/config.php';
        if (!file_exists($config_file)) {
            throw new RuntimeException('Database configuration not found. Copy config/config.sample.php to config/config.php and fill in your credentials.');
        }
        $cfg = require $config_file;

        $dsn = sprintf(
            'mysql:host=%s;port=%d;dbname=%s;charset=utf8mb4',
            $cfg['db_host'] ?? 'localhost',
            $cfg['db_port'] ?? 3306,
            $cfg['db_name'] ?? ''
        );

        $pdo = new PDO($dsn, $cfg['db_user'] ?? '', $cfg['db_pass'] ?? '', [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ]);
    }
    return $pdo;
}
