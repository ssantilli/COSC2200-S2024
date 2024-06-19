<?php
namespace model;
class Account
{
  public $id;
  public string $account_number;
  public float $balance;
  public ?string $owner;

  public $customer_id;

    public function __construct($owner, $accountNumber, $balance = 0)
    {
        $this->owner = $owner;
        $this->account_number = $accountNumber;
        $this->balance = $balance;
    }

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


  public function getOwner(): ?string
  {
      return $this->owner;
  }

    public function getAccountnumber(): string
    {
        return $this->account_number;
    }

    protected function updateBalance($amount): void
  {
      $this->balance = $amount;
  }

  public function getAccountDetails(): string
  {
      //WEEK 4 - Nullable Type
      $nameDisplay = $this->owner ?? 'Unknown Customer';
      return "Owner: {$nameDisplay}, Account Number: {$this->account_number}, Balance: {$this->balance}";
  }

    public function getBalance() {
        return $this->balance;
    }

}