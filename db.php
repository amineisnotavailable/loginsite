<?php
$host = "localhost";      // Server name
$dbname = "users_db";     // Your database name
$username = "root";       // Default for XAMPP
$password = "";           // Leave empty if using XAMPP default

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("❌ Database connection failed: " . $e->getMessage());
}
?>