<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = trim($_POST['user'] ?? '');
    $remember = $_POST['remember'] ?? '';

    $_SESSION['user'] = $user;

    if ($remember) {
        setcookie('remember_me', $user);
    }
    echo "Logged in user: $user";
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
    <h3>Log in page</h3>
    <form method="post">
        <input type="text" name="user" placeholder="username">
        <input type="checkbox" name="remember"> Remember Me
        <input type="submit" value="Login">
    </form>
</body>
</html>