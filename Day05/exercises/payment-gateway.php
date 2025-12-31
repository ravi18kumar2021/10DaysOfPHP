<?php
interface PaymentGateway {
    public function pay($amount);
}
class Paypal implements PaymentGateway {
    public function pay($amount) {
        return "Paypal amount of $amount";
    }
}
class Stripe implements PaymentGateway {
    public function pay($amount) {
        return "Stripe amount of $amount";
    }
}
class OrderService {
    private $gateway;

    public function __construct($gateway) {
        $this->gateway = $gateway;
    }

    public function checkout($amount) {
        return $this->gateway->pay($amount);
    }
}
$order = new OrderService(new Stripe());
echo $order->checkout(500);
?>