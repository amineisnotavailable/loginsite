<?php
session_start();
require "db.php";

$error = "";

// If already logged in
if (isset($_SESSION['username'])) {
    echo "Welcome, " . htmlspecialchars($_SESSION['username']) . "! <a href='?logout=true'>Logout</a>";
    if (isset($_GET['logout'])) {
        session_destroy();
        header("Location: login.php");
    }
    exit();
}

// Handle login form
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $user['username'];
        header("Location: login.php");
        exit();
    } else {
        $error = "❌ Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Registeration</title>
</head>
<body>
    <div class="login-box">
        <h2>Company</h2>
        <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
