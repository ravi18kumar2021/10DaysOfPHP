<?php
require '../config/database-connection.php';
require '../repositories/user-repository.php';

$db = new Database();
$userRepo = new UserRepository($db->getConnection());
$id = $_GET['id'];
if (!$id) {
    echo "ID is missing";
} else {
    $userRepo->delete($id);
    header('Location:index.php');
}
?>