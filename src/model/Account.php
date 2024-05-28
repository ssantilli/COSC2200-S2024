<?php
namespace model;
class Account
{
  protected $accountNumber;
  protected $balance;
  protected $owner;    //WEEK 4: Nullable type, customerName can be null


  public function __construct($owner, $accountNumber, $balance = 0)
  {
      $this->owner = $owner;
      $this->accountNumber = $accountNumber;
      $this->balance = $balance;
  }

  public function getOwner() {
      return $this->owner;
  }

  protected function updateBalance($amount): void
  {
      $this->balance = $amount;
  }

  //WEEK 4
  public function getAccountDetails(): string
  {
      return "Owner: {$this->owner}, Account Number: {$this->accountNumber}, Balance: {$this->balance}";
  }


}