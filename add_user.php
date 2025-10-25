<?php
require "db.php";

// Your desired login info
$username = "admin";
$plainPassword = "1234";

// Hash the password
$hashedPassword = password_hash($plainPassword, PASSWORD_DEFAULT);

// Insert into database
$stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
$stmt->execute([$username, $hashedPassword]);

echo "✅ User '$username' added with password '1234'";
?>