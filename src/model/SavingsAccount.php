<?php

require_once 'Account.php';

class SavingsAccount extends Account
{
    private $interestRate;

    public function __construct($customerName, $accountNumber, $balance, $interestRate)
    {
        parent::__construct($customerName, $accountNumber, $balance);
        $this->interestRate = $interestRate;
    }

    public function applyInterestRate(){
        $this->updateBalance($this->balance * $this->interestRate/100);
    }


}