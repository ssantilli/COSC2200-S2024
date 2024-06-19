<?php

namespace model;

use PDO;

/**
 * Manages account data using a database.
 */
class DatabaseStorage {
    private PDO $pdo;

    public function __construct($dsn, $username, $password) {
        $this->pdo = new PDO($dsn, $username, $password);
    }

    /**
     * Inserts an account into the database.
     */
    public function saveAccount(Account $account): void
    {
        $stmt = $this->pdo->prepare("INSERT INTO accounts (accountNumber, balance) VALUES (?, ?)");
        $stmt->execute([$account->getAccountNumber(), $account->getBalance()]);
    }

    /**
     * Retrieves all accounts from the database.
     */
    public function getAllAccounts(): false|array
    {
        $stmt = $this->pdo->query("SELECT * FROM accounts");
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'model\\Account');
    }
}
