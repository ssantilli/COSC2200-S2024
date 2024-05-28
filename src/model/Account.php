<?php
namespace model;
class Account
{
  protected string $accountNumber;
  protected float $balance;
  protected ?string $owner;    //WEEK 4: Nullable type, owner can be null


  public function __construct($owner, $accountNumber, $balance = 0)
  {
      $this->owner = $owner;
      $this->accountNumber = $accountNumber;
      $this->balance = $balance;
  }

  public function getOwner(): ?string
  {
      return $this->owner;
  }

  protected function updateBalance($amount): void
  {
      $this->balance = $amount;
  }

  public function getAccountDetails(): string
  {
      //WEEK 4 - Nullable Type
      $nameDisplay = $this->owner ?? 'Unknown Customer';
      return "Owner: {$nameDisplay}, Account Number: {$this->accountNumber}, Balance: {$this->balance}";
  }


}