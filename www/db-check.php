<?php
declare(strict_types=1);

header('Content-Type: text/plain; charset=utf-8');

$host = getenv('DB_HOST') ?: 'db';
$db   = getenv('DB_NAME') ?: 'lamp';
$user = getenv('DB_USER') ?: 'lamp';
$pass = getenv('DB_PASS') ?: '';

try {
    $dsn = sprintf('mysql:host=%s;dbname=%s;charset=utf8mb4', $host, $db);
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);

    $version = $pdo->query('SELECT VERSION() AS ver')->fetchColumn();
    $tables  = $pdo->query('SHOW TABLES')->fetchAll(PDO::FETCH_COLUMN);

    echo "MariaDB connection: OK\n";
    echo "Server version: {$version}\n";
    echo "Database: {$db}\n";
    echo "Tables (" . count($tables) . "): " . ($tables ? implode(', ', $tables) : 'none') . "\n";
} catch (Throwable $e) {
    http_response_code(500);
    echo "MariaDB connection: FAILED\n";
    echo "Error: " . $e->getMessage() . "\n";
}