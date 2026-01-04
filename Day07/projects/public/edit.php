<?php
require '../config/database-connection.php';
require '../repositories/user-repository.php';

$db = new Database();
$userRepo = new UserRepository($db->getConnection());
$id = $_GET['id'];
if (!$id) {
    "Id is missing";
} else {
    $user = $userRepo->find($id);
}
?>

<h2>Edit user</h2>
<form method="post">
    <input type="text" name="name" value="<?= $user['name'] ?>" placeholder="Enter name">
    <input type="email" name="email" value="<?= $user['email'] ?>" placeholder="Enter email">
    <input type="submit" value="Add">
    <a href="index.php">Cancel</a>
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
    header('Location:index.php');
}
?>