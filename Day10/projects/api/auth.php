<?php
header("Content-Type: application/json");
session_start();

require '../config/database-connection.php';
require '../repositories/user-repository.php';

$db = new Database();
$userRepo = new UserRepository($db->getConnection());

$action = $_GET['action'] ?? '';

$data = json_decode(file_get_contents("php://input"), TRUE);

switch ($action) {
    case "register":
        $name = trim($data['name'] ?? '');
        $email = trim($data['email'] ?? '');
        $password = trim($data['password'] ?? '');
        if ($name === '' || $email === '' || strlen($password) < 8) {
            http_response_code(400);
            echo json_encode(["error" => "Invalid input"]);
            exit;
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            http_response_code(400);
            echo json_encode(["error" => "Invalid email"]);
            exit;
        }
        $hashed_pass = password_hash($password, PASSWORD_DEFAULT);
        try {
            $userRepo->create($name, $email, $hashed_pass);
            echo json_encode(["message" => "User created"]);
        } catch (Exception $e) {
            http_response_code(409);
            echo json_encode(["error" => "Email already exists"]);
        }
        break;
    case "login":
        $email = trim($data['email'] ?? '');
        $password = trim($data['password'] ?? '');
        if ($email === '' || $password === '') {
            http_response_code(400);
            echo json_encode(["error" => "Missing credentials"]);
            exit;
        }
        $user = $userRepo->findByEmail($email);
        if ($user && password_verify($password, $user['password'])) {
            session_regenerate_id(TRUE);
            $_SESSION['user_id'] = $user['id'];
            echo json_encode(["message" => "Login successful"]);
        } else {
            http_response_code(401);
            echo json_encode(["error" => "Invalid credentials"]);
        }
        break;
    case "logout":
        session_destroy();
        echo json_encode(["message" => "Logged out"]);
        break;
    default:
        http_response_code(404);
        echo json_encode(["error" => "Invalid action"]);
}
?>