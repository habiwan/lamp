<?php
header('Content-Type: text/plain; charset=utf-8');

echo "LAMP Stack is up\n";
echo "PHP version: " . PHP_VERSION . "\n";

$host = getenv('DB_HOST') ?: 'db';
$db   = getenv('DB_NAME') ?: '';
$user = getenv('DB_USER') ?: '';
$pass = getenv('DB_PASS') ?: '';

try {
    $dsn = mysql:host=${host};dbname=${db};charset=utf8mb4;
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);
    echo "Database connection: OK\n";
} catch (Throwable $e) {
    http_response_code(500);
    echo "Database connection: FAILED (" . $e->getMessage() . ")\n";
}
