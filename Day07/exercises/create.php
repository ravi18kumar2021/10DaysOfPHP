<?php
require 'database-connection.php';
require 'user-repository.php';

$db = new Database();
$userRepo = new UserRepository($db->getConnection());
?>

<h2>Add user</h2>
<form method="post">
    <input type="text" name="name" placeholder="Enter name">
    <input type="email" name="email" placeholder="Enter email">
    <input type="submit" value="Add">
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
    
    $userRepo->create($name, $email);
    echo "User created successfully";
}
?>