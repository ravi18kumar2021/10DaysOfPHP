<?php
class AuthService {
    private $validUser = "Ravi";
    private $validPass = "1234";

    public function login($username, $password) {
        if ($username === $this->validUser && $password === $this->validPass) {
            return "User Authenticated";
        } else {
            return "Invalid credentials";
        }
    }
}

$auth = new AuthService();
echo $auth->login("Ravi", "1234");
?>