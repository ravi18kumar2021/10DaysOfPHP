<?php
require '../config/database-connection.php';
require '../repositories/user-repository.php';

$db = new Database();
$userRepo = new UserRepository($db->getConnection());
?>

<h2>Add new user</h2>
<a href="index.php">View users</a>
<br><br>
<form method="post">
    <input type="text" name="name" placeholder="Enter name">
    <input type="email" name="email" placeholder="Enter email">
    <input type="submit" value="Add">
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
    $userRepo->create($name, $email);
    echo "User created successfully";
}
?>