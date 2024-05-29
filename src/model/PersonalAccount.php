<?php
namespace model;

require_once __DIR__ . '/../interface/Transactable.php';

class PersonalAccount extends Account implements \interface\Transactable
{
    public function deposit($amount): void {
        $this->updateBalance($amount);
        echo "Deposited {$amount} to " . $this->getOwner() . "'s account<br>";
    }



    /**
     * //WEEK 5
     * @throws InsufficientFundsException
     */
    public function withdraw($amount): void {
        if($amount<=$this->balance)
        {
           $this->updateBalance(-$amount);
            echo "Withdrew {$amount} from " . $this->getOwner() . "'s account<br>";
        }else{
            //Week 5
            echo "Insufficient funds to withdraw {$amount} from " . $this->getOwner() . "'s account<br>";
            throw new InsufficientFundsException();
        }
    }

    public function displayAccount(): void
    {
        echo $this->getAccountDetails() . "<br>";
    }

}