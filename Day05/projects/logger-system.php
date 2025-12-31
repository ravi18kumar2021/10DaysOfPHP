<?php
trait Logger {
    public function log($message) {
        echo "Log : " . $message . PHP_EOL;
    }
}
class UserService {
    use Logger;
    public function register() {
        $this->log("User registered");
    }
}
class OrderService {
    use Logger;
    public function placeOrder() {
        $this->log("Order placed");
    }
}
$user = new UserService();
$user->register();
echo "<br>";
$order = new OrderService();
$order->placeOrder();
?>