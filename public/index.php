<?php

require_once __DIR__ . '/../src/model/Customer.php';
require_once __DIR__ . '/../src/model/PersonalAccount.php';
require_once __DIR__ . '/../src/model/SavingsAccount.php';
require_once __DIR__ . '/../src/model/InsufficientFundsException.php';

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
$customer->addAccount($acct2);   // WEEK6

$acct1->deposit(500);


// WEEK6 - Testing type and value comparisons
echo "Performing transactions:<br>";
try {
    $acct1->withdraw(200);
} catch (\model\InsufficientFundsException $e) {
    echo "Error: " . $e->getMessage() . "<br>";
}

$acct2->applyInterestRate();

// WEEK 6 - Testing sorting collections
echo "Accounts before sorting:<br>";
$customer->displayAccounts();

echo "Sorting accounts by balance...<br>";
$customer->sortAccounts();


$customer->displayAccounts(function($account){
    echo "Logging account: {$account->accountNumber} with balance {$account->balance}\n";
});

// WEEK6 - Demonstrating type casting in account lookup
$requestedAccount = $customer->getAccountByNumber('12345');  // Simulating string input that should be integer
if ($requestedAccount) {
    echo "Retrieved Account: " . $requestedAccount->getAccountNumber() . " with balance " . $requestedAccount->getBalance() . "<br>";
} else {
    echo "No account found for the number provided.<br>";
}
