<?php
header("Content-Type: application/json");

require '../config/database-connection.php';
require '../repositories/user-repository.php';

$data = json_decode(file_get_contents("php://input"), TRUE);
$name = trim($data['name'] ?? '');
$email = trim($data['email'] ?? '');

if (!$data || empty($name) || empty($email)) {
    http_response_code(400);
    echo json_encode(["error" => "Invalid input"]);
    exit;
}

$db = new Database();
$userRepo = new UserRepository($db->getConnection());
$userRepo->create($name, $email);

http_response_code(201);
echo json_encode(["message" => "User created"]);
?>