<?php
namespace model;

require_once 'Account.php';

class Customer
{

    private $accounts = [];

    public function addAccount(Account $account){
        $this->accounts[] = $account;
    }

    public function displayAccounts() {
        foreach($this->accounts as $account) {
            $account->displayAccount();
        }
    }

}