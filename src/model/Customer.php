<?php

namespace model;

require_once 'Account.php';

class Customer
{
    private $accounts = [];

    public function addAccount(Account $account): void {
        $this->accounts[] = $account;
        echo "Added account for " . $account->getOwner() . "<br>";
    }

    public function displayAccounts(): void  {
        foreach($this->accounts as $account) {
            echo $account->displayAccount() . "<br>";
        }
    }

}