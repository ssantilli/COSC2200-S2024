<?php

require_once __DIR__ . '/../src/model/Customer.php';
require_once __DIR__ . '/../src/model/PersonalAccount.php';
require_once __DIR__ . '/../src/model/SavingsAccount.php';
require_once __DIR__ . '/../src/model/InsufficientFundsException.php';
require_once __DIR__ . '/../src/model/DatabaseStorage.php';

use model\Account;
use model\Customer;
use model\InsufficientFundsException;
use model\PersonalAccount;
use model\SavingsAccount;
use model\DatabaseStorage;

// http://localhost:8080/src/debug/index.php
echo "Welcome to COSC2200!<br><br>";

#phpinfo();
#xdebug_info();

echo "<br>";
echo " ----- Week 4-5 ---- " . "<br>";
$customer = new Customer();
$acct1 = new PersonalAccount("Bruce Wayne", 12345, 1000);
$acct2 = new SavingsAccount("Peter Parker", 67890, 5000, 2);

$customer->addAccount($acct1);
$customer->addAccount($acct2);   // WEEK6

$acct1->deposit(500);


// WEEK6 - Testing type and value comparisons
echo "<br>";
echo " ----- Week 6 ---- " . "<br>";
echo "Performing transactions:<br>";
try {
    $acct1->withdraw(200);
} catch (InsufficientFundsException $e) {
    echo "Error: " . $e->getMessage() . "<br>";
}

$acct2->applyInterestRate();

// WEEK 6 - Testing sorting collections
echo "Testing sorting collections" . "<br>";
echo "Accounts before sorting:<br>";
$customer->displayAccounts();

echo "Sorting accounts by balance...<br>";
$customer->sortAccounts();

$customer->displayAccounts(function($account){
    //echo "Logging account: {$account->accountNumber} with balance {$account->balance}\n";
    echo "**Callback --> Processed account information**" . "<br>";
});

// WEEK6 - Demonstrating type casting in account lookup
echo "Demonstrating Casting" . "<br>";
$requestedAccount = $customer->getAccountByNumber('12345');  // Simulating string input that should be integer
if ($requestedAccount) {
    echo "Retrieved Account: " . $requestedAccount->getAccountNumber() . " with balance " . $requestedAccount->getBalance() . "<br>";
} else {
    echo "No account found for the number provided.<br>";
}

//Week 7
echo "<br>";
echo " ----- Week 7 ---- " . "<br>";
echo "Database Connectivity" . "<br>";
//$dsn = 'pgsql:host=localhost;port=5435;dbname=BankingDB;';
$dsn = 'pgsql:host=host.docker.internal;port=5435;dbname=BankingDB;';
$username = 'admin';
$password = 'password';
$storage = new DatabaseStorage($dsn, $username, $password);


try {
    $newAccount = new Account("Bruce Wayne", "987654321");
    //$storage->saveAccount($newAccount);
    $accounts = $storage->getAllAccounts();
    //print_r($accounts);
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}


