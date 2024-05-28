<?php

require_once __DIR__ . '/../src/model/Customer.php';
require_once __DIR__ . '/../src/model/PersonalAccount.php';
require_once __DIR__ . '/../src/model/SavingsAccount.php';

use model\Customer;
use model\PersonalAccount;
use model\SavingsAccount;

// http://localhost:8080/src/debug/index.php
echo "Welcome to COSC2200!<br><br>";

#phpinfo();
#xdebug_info();

$customer = new Customer();
$acct1 = new PersonalAccount("Bruce Wayne", 12345, 1000);
$acct2 = new SavingsAccount("Peter Parker", 67890, 5000, 2);

$customer->addAccount($acct1);

$acct1->deposit(500);
$acct1->withdraw(200);
$acct2->applyInterestRate();

$customer->displayAccounts();


