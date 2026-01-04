<?php
header("Content-Type: application/json");

require '../config/database-connection.php';
require '../repositories/user-repository.php';

$db = new Database();
$userRepo = new UserRepository($db->getConnection());
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case "GET":
        if (isset($_GET['id'])) {
            $user = $userRepo->find($_GET['id']);
            if ($user) {
                echo json_encode($user);
            } else {
                http_response_code(404);
                echo json_encode(["Error" => "User not found"]);
            }
        } else {
            json_encode($userRepo->all());
        }
        break;
    case "POST":
        $data = json_decode(file_get_contents("php://input"), TRUE);
        $name = trim($data['name'] ?? '');
        $email = trim($data['email'] ?? '');
        if (empty($name) || empty($email)) {
            http_response_code(400);
            echo json_encode(["error" => "Invalid input"]);
            break;
        }
        $userRepo->create($name, $email);
        http_response_code(201);
        echo json_encode(["message" => "User created"]);
        break;
    case "PUT":
        parse_str(file_get_contents("php://input"), $data);
        $id = trim($data['id']);
        $name = trim($data['name']);
        $email = trim($data['email']);
        if (empty($id) || empty($name) || empty($email)) {
            http_response_code(400);
            echo json_encode(["error" => "Invalid input"]);
            break;
        }
        $userRepo->update($id, $name, $email);
        echo json_encode(["message" => "User updated"]);
        break;
    case "DELETE":
        parse_str(file_get_contents("php://input"), $data);
        $id = trim($data['id']);
        if (empty($id)) {
            http_response_code(400);
            echo json_encode(["error" => "ID is missing"]);
            break;
        }
        $userRepo->delete($id);
        echo json_encode(["message" => "User deleted"]);
        break;
    default:
        http_response_code(405);
        echo json_encode(["error" => "Method not allowed"]);
}
?>