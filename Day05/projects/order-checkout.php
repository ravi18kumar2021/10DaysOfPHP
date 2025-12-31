<?php
interface DiscountPolicy {
    public function apply($amount);
}
class NoDiscount implements DiscountPolicy {
    public function apply($amount) {
        return $amount;
    }
}
class PercentageDiscount implements DiscountPolicy {
    public function apply($amount) {
        return $amount * 0.9;
    }
}
class CheckoutService {
    private $discount;

    public function __construct($discount) {
        $this->discount = $discount;
    }
    public function checkout($amount) {
        return $this->discount->apply($amount);
    }
}
$checkout = new CheckoutService(new PercentageDiscount());
echo $checkout->checkout(5000);
?>