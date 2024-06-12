<?php
namespace model;

require_once __DIR__ . '/../interface/Transactable.php';

class PersonalAccount extends Account implements \interface\Transactable
{

    public function __construct($name, $accountNumber, $initialBalance) {
        parent::__construct($name, $accountNumber);
        $this->balance = $initialBalance;
    }

    /**
     * Week 6 - Changes
     * @param $amount
     * @return void
     */
    public function deposit($amount): void {
        if(!is_numeric($amount) || $amount <= 0){
            throw new \InvalidArgumentException("Invalid Amount");
        }
        $this->updateBalance($amount);
    }

    /**
     * Week 6 - Changes
     * @throws InsufficientFundsException
     */
    public function withdraw($amount): void {
        if(!is_numeric($amount) || $amount <= 0){
            throw new \InvalidArgumentException("In valid Amount");
        }
        if($amount > $this->balance){
            throw new InsufficientFundsException();
        }
        $this->balance -= $amount;
    }

    /**
     * Week 6 - Example of Type and value comparison
     * @throws InsufficientFundsException
     */
    public function transfer($amount, PersonalAccount $otherAccount): void
    {
        if($this === $otherAccount){   //Type and reference comparison
            throw new \Exception("Cannot transfer to the same account");
        }
        $this->withdraw($amount);
        $otherAccount->deposit($amount);
    }

    /**
     * @return void
     */
    public function displayAccount(): void
    {
        echo $this->getAccountDetails() . "<br>";
    }
}