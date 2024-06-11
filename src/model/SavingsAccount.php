<?php
namespace model;
require_once 'Account.php';

class SavingsAccount extends Account
{
    private float $interestRate;

    public function __construct($owner, $accountNumber, $balance, $interestRate) {
        parent::__construct($owner, $accountNumber, $balance);
        $this->interestRate = $interestRate;
    }

    public function applyInterestRate(): void  {
        $this->updateBalance($this->balance + ($this->balance * $this->interestRate/100));
        echo "Applied interest rate to " . $this->getOwner() . "'s account<br>";
    }


}