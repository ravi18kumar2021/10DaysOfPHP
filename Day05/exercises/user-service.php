<?php
trait Logger {
    public function log($message) {
        echo "Log : $message";
    }
}
class UserService {
    use Logger;

    public function createUser() {
        $this->log("User created");
    }
}
$service = new UserService();
$service->createUser();
?>