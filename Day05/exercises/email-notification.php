<?php
abstract class Notification {
    protected $message;

    public function __construct($message) {
        $this->message = $message;
    }

    abstract public function send();

    public function format() {
        return strtoupper($this->message);
    }
}
class EmailNotification extends Notification {
    public function send() {
        return "Email sent : " . $this->format();
    }
}
$email = new EmailNotification("Welcome user");
echo $email->send();
?>