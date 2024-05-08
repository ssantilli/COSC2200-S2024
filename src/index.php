<?php

require_once 'Customer.php';
require_once 'PersonalAccount.php';
require_once 'SavingsAccount.php';

$customer = new Customer();
$acct1 = new PersonalAccount("Bruce Wayne", 12345, 1000);
$acct2 = new SavingsAccount("Peter Parker", 67890, 5000, 2);

$customer->addAccount($acct1);
$customer->addAccount($acct1);

$acct1->deposit(500);
$acct1->withdraw(200);
$acct2->applyInterestRate();

$customer->displayAccounts();




