<?php
// includes/config.php

$DB_HOST = "localhost"; // stays localhost on cPanel
$DB_NAME = "unhscoke_school"; // your database name
$DB_USER = "unhscoke_admin"; // the db user you created in cPanel
$DB_PASS = "0202031502j";       // that user’s password

try {
    $pdo = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME;charset=utf8mb4", $DB_USER, $DB_PASS, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (PDOException $e) {
    exit("DB connection failed: " . htmlspecialchars($e->getMessage()));
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
