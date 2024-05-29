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

    //WEEK 5 - Add a delegate-like callable parameter for custom actions
    public function displayAccounts(callable $customAction = null): void  {
        foreach($this->accounts as $account) {
            echo $account->displayAccount() . "<br>";
            if($customAction){
                $customAction($account);
            }
        }
    }

}