<?php

class Account
{
  public $accountNumber;
  protected $balance;
  private ?string $customerName;    //WEEK 4: Nullable type, customerName can be null


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
      //WEEK 4:
      $nameDisplay = $this->customerName ?? 'Unknown Customer';
      echo "Account {$this->accountNumber} owned by {$this->customerName} has a balance: {$this->balance}";
  }


}