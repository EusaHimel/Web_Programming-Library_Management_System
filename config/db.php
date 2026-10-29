<?php
declare(strict_types=1);
require_once __DIR__ . '/auth.php';
function pdo(): PDO {
    static $pdo = null;
    if ($pdo) return $pdo;
    $pdo = new PDO(
        'mysql:host=localhost;dbname=library_db;charset=utf8mb4',
        'root', '',
        [
            PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES=>false
        ]
    );
    return $pdo;
}
function json_input(): array {
    $d=json_decode(file_get_contents('php://input') ?: '{}', true);
    return is_array($d) ? $d : [];
}
