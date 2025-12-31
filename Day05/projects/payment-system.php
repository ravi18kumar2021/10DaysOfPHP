<?php
interface PaymentGateway {
    public function pay($amount);
}
class PaypalGateway implements PaymentGateway {
    public function pay($amount) {
        return "Paid $amount via Paypal";
    }
}
class StripeGateway implements PaymentGateway {
    public function pay($amount) {
        return "Paid $amount via Stripe";
    }
}
class PaymentService {
    private $gateway;
    public function __construct($gateway) {
        $this->gateway = $gateway;
    }
    public function process($amount) {
        return $this->gateway->pay($amount);
    }
}
$service = new PaymentService(new PaypalGateway());
echo $service->process(1800);
?>