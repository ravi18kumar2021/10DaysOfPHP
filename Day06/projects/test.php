<?php
require "database-connection.php";
require "user-repository.php";

$db = new Database();
$userRepo = new UserRepository($db->getConnection());

$userRepo->create("ravi", "ravi@gmail.com");

// print_r($userRepo->all());

// $userRepo->update(3, "amit@gmail.com");

// print_r($userRepo->find(1));

// $userRepo->delete(4);
?>