<?php

namespace model;

use PDO;
use PDOException;

class DatabaseStorage {
    private $pdo;

    public function __construct($dsn, $username, $password) {
        $this->pdo = new PDO($dsn, $username, $password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }

    public function saveAccount(Account $account): void {
        $stmt = $this->pdo->prepare("INSERT INTO accounts (owner, account_number, balance) VALUES (?, ?, ?)");
        $stmt->execute([$account->owner, $account->account_number, $account->balance]);
    }

    public function getAllAccounts(): array {
        $stmt = $this->pdo->query("SELECT * FROM accounts");
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $accounts = [];
        foreach ($results as $row) {
            $account = new Account($row['owner'], $row['account_number'], $row['balance']);
            $account->id = $row['id'];
            $accounts[] = $account;
        }
        return $accounts;
    }



}
