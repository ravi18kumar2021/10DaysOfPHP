<?php
abstract class Notification {
    protected $message;
    public function __construct($message) {
        $this->message = $message;
    }
    abstract public function send();
    protected function format() {
        return strtoupper($this->message);
    }
}
class EmailNotification extends Notification {
    public function send() {
        return "Email : " . $this->format();
    }
}
class SMSNotification extends Notification {
    public function send() {
        return "SMS : " . $this->format();
    }
}
$email = new EmailNotification("welcome user");
echo $email->send();
echo "<br>";
$sms = new SMSNotification("otp sent");
echo $sms->send();
?>