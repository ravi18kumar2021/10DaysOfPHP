<?php
require '../config/database-connection.php';
require '../security/csrf.php';

$db = new Database();
$pdo = $db->getConnection();
?>

<h2>Register User</h2>
<form method="POST">
    <input type="hidden" name="csrf" value="<?= csrf_token() ?>">
    <input type="text" name="name" placeholder="Enter name" required>
    <input type="email" name="email" placeholder="Enter email" required>
    <input type="password" name="password" placeholder="Enter password" required>
    <input type="submit" value="Register">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!verify_csrf($_POST['csrf'])) {
        die("CSRF detected");
    }
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');
    if ($name === '' || $email === '' || $password === '') {
        die("All fields are required");
    } elseif (!ctype_alpha(str_replace(' ', '', $name))) {
        die("Name must contains alphabets");
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email");
    } elseif (strlen($password) < 8) {
        die("Password contains atleast 8 characters");
    }
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $sql = 'INSERT INTO auth (name, email, password) VALUES (?, ?, ?)';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$name, $email, $hash]);
    echo "Registration successful";
}
?>