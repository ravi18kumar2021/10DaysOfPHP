<?php
header("Content-Type: application/json");
$response = [
    "status" => "success",
    "message" => "API is working"
];
echo json_encode($response);
?>