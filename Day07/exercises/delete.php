<?php
require 'database-connection.php';
require 'user-repository.php';

$db = new Database();
$userRepo = new UserRepository($db->getConnection());

$id = $_GET['id'] ?? null;

if (!$id) {
    die("User ID is missing");
} else {
    $user = $userRepo->delete($id);
    header('Location:view.php');
}
?>