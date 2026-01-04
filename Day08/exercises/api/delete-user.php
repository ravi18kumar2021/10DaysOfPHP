<?php
header('Content-Type: application/json');
require '../config/database-connection.php';
require '../repositories/user-repository.php';

parse_str(file_get_contents('php://input'), $data);
$id = trim($data['id'] ?? '');
if (empty($id)) {
    http_response_code(400);
    echo json_encode(["error" => "ID is missing"]);
    exit;
}
$db = new Database();
$userRepo = new UserRepository($db->getConnection());
$userRepo->delete($id);

echo json_encode(["message" => "User deleted"]);
?>