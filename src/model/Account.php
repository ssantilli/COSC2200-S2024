<?php
namespace model;
class Account
{
  public $id;
  public string $accountnumber;
  public float $balance;
  public ?string $owner;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }


  public function __construct($owner, $accountNumber, $balance = 0)
  {
      $this->owner = $owner;
      $this->accountnumber = $accountNumber;
      $this->balance = $balance;
  }

  public function getOwner(): ?string
  {
      return $this->owner;
  }

    public function getAccountnumber(): string
    {
        return $this->accountnumber;
    }

    protected function updateBalance($amount): void
  {
      $this->balance = $amount;
  }

  public function getAccountDetails(): string
  {
      //WEEK 4 - Nullable Type
      $nameDisplay = $this->owner ?? 'Unknown Customer';
      return "Owner: {$nameDisplay}, Account Number: {$this->accountnumber}, Balance: {$this->balance}";
  }

    public function getBalance() {
        return $this->balance;
    }

}