<?php
header("Content-Type: application/json");
session_start();

require '../config/database-connection.php';
require '../repositories/user-repository.php';

if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    echo json_encode(["error" => "Unauthorized"]);
    exit;
}

$db = new Database();
$userRepo = new UserRepository($db->getConnection());

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case "GET":
        echo json_encode($userRepo->all());
        break;
    case "DELETE":
        parse_str(file_get_contents("php://input"), $data);
        if (empty($data['id'])) {
            http_response_code(400);
            echo json_encode(["error" => "ID is missing"]);
            exit;
        }
        $userRepo->delete((int)$data['id']);
        echo json_encode(["message" => "User deleted"]);
        break;
    default:
        http_response_code(405);
        echo json_encode(["error" => "Method not allowed"]);
}
?>