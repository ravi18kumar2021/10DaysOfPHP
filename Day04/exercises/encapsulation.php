<?php
class BankAccount {
    private $balance = 0;

    public function deposit($amount) {
        if ($amount <= 0) {
            return "Invalid amount";
        }
        $this->balance += $amount;
    }
    public function getBalance() {
        return $this->balance;
    }
}

$acc = new BankAccount();
$acc->deposit(500);
echo $acc->getBalance();
?>