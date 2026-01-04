<?php
header("Content-Type: application/json");

require '../config/database-connection.php';
require '../repositories/user-repository.php';

$db = new Database();
$userRepo = new UserRepository($db->getConnection());

echo json_encode($userRepo->all());
?>