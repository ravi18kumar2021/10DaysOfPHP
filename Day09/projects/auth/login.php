<?php
require '../config/database-connection.php';
require '../security/csrf.php';

$db = new Database();
$pdo = $db->getConnection();
?>

<h2>Login User</h2>
<form method="post">
    <input type="hidden" name="csrf" value="<?= csrf_token() ?>">
    <input type="email" name="email" placeholder="Enter email" required>
    <input type="password" name="password" placeholder="Enter password" required>
    <input type="submit" value="Login">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!verify_csrf($_POST['csrf'])) {
        die("CSRF detected");
    }
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');
    if ($email === '' || $password === '') {
        die("All fields are required");
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email");
    }
    $sql = 'SELECT * FROM auth WHERE email = ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        session_regenerate_id(TRUE);
        $_SESSION['user_id'] = $user['id'];
        header("Location: dashboard.php");
        exit;
    }
    echo "Invalid credentials";
}
?>