<?php
header("Content-Type: application/json");

require '../config/database-connection.php';
require '../repositories/user-repository.php';

parse_str(file_get_contents("php://input"), $data);
$id = trim($data['id'] ?? '');
$name = trim($data['name'] ?? '');
$email = trim($data['email'] ?? '');

if (empty($id) || empty($name) || empty($email)) {
    http_response_code(400);
    echo json_encode(["error" => "Invalid input"]);
    exit;
}
$db = new Database();
$userRepo = new UserRepository($db->getConnection());
$userRepo->update($id, $name, $email);
echo json_encode(["message" => "User updated"]);
?>