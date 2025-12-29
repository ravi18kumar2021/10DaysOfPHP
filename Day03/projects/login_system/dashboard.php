<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Dashboard page</h3>
    <p>Welcome, <?= htmlspecialchars($_SESSION['user']) ?></p>
    <a href="logout.php">Logout</a>
</body>
</html>