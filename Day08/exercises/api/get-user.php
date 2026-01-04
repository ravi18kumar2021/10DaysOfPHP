<?php
header("Content-Type: application/json");

require '../config/database-connection.php';
require '../repositories/user-repository.php';

$id = $_GET['id'] ?? NULL;
if (!$id) {
    http_response_code(400);
    echo json_encode(["error" => "ID is missing"]);
    exit;
}
$db = new Database();
$userRepo = new UserRepository($db->getConnection());
$user = $userRepo->find($id);

if (!$user) {
    http_response_code(404);
    echo json_encode(["error" => "User not found"]);
    exit;
}

echo json_encode($user);
?>