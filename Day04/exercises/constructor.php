<?php
class User {
    public $name;
    public $email;

    public function __construct($name, $email) {
        $this->name = $name;
        $this->email = $email;
    }
    public function getInfo() {
        return $this->name . " - " . $this->email;
    }
}
$user = new User("Ravi", "Ravi@gmail.com");
echo $user->getInfo();
?>