<?php

namespace model;

require_once 'Account.php';

class Customer
{
    private array $accounts = [];

    public function addAccount(Account $account): void {
        $this->accounts[] = $account;
        echo "Added account for " . $account->getOwner() . "<br>";
    }

    public function displayAccounts(callable $customAction = null): void  {
        foreach($this->accounts as $account) {
            echo $account->displayAccount() . "<br>";
            if($customAction){
                $customAction($account);
            }
        }
    }

    /**
     * Week 6
     * @return void
     */
    public function sortAccounts(): void
    {
        //Sort an array by values using a user-defined comparison function
        usort($this->accounts, function($a, $b){
            // Using the spaceship operator for value comparison
            return $a->getBalance() <=> $b->getBalance();
        });
    }

    /**
     * Week 6 - Step 4
     * @param $accountNumber
     * @return void
     */
    public function getAccountNumber($accountNumber)
    {
        $accountNumber = (int) $accountNumber; //ensure the account number is an integer

        foreach($this->accounts as $account){
            if($account->getAccountNumber() == $accountNumber){
                return $account;
            }
        }
        return null; // return null if no account found
    }

}