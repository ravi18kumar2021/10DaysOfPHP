<?php
require 'database-connection.php';
require 'user-repository.php';

$db = new Database();
$userRepo = new UserRepository($db->getConnection());

$id = $_GET['id'] ?? null;

if (!$id) {
    die("User ID is missing");
}
$user = $userRepo->find($id);
?>

<h2>Edit User</h2>
<form method="post">
    <input type="text" name="name" value="<?= $user['name'] ?>" placeholder="Enter name">
    <input type="email" name="email" value="<?= $user['email'] ?>" placeholder="Enter email">
    <input type="submit" value="Update">
    <a href="view.php">View</a>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');

    if ($name === '' || $email === '') {
        echo "All fields are required";
        exit;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email";
        exit;
    }

    $userRepo->update($id, $name, $email);
    header('Location:view.php');
}
?>