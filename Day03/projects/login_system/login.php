<?php
session_start();

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = trim($_POST['user'] ?? '');
    $pass = trim($_POST['pass'] ?? '');

    if ($user === 'ravi' && $pass === '1234') {
        session_regenerate_id(TRUE);
        $_SESSION['user'] = $user;
        $_SESSION['pass'] = $pass;
        header('Location: dashboard.php');
        exit;
    } else {
        $error = 'Invalid credentials';
    }
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
    <h3>Login User</h3>
    <form method="post">
        <input type="text" name="user" placeholder="Enter username">
        <input type="password" name="pass" placeholder="Enter password">
        <input type="submit" value="Login">
    </form>
    <p style="color:red"><?= htmlspecialchars($error) ?></p>
</body>
</html>