<?php

class Account
{
  public $accountNumber;
  protected $balance;
  private $customerName;


  public function __construct($customerName, $accountNumber, $balance = 0)
  {
      $this->customerName = $customerName;
      $this->accountNumber = $accountNumber;
      $this->balance = $balance;
  }

  protected function updateBalance($amount) {
      $this->balance = $amount;
  }

  public function displayAccount(){
      echo "Account {$this->accountNumber} owned by {$this->customerName} has a balance: {$this->balance}";
  }


}