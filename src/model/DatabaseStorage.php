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
        $stmt = $this->pdo->prepare("INSERT INTO accounts (accountNumber, balance) VALUES (?, ?)");
        $stmt->execute([$account->accountnumber, $account->balance]);
    }

    public function getAllAccounts(): array {
        $stmt = $this->pdo->query("SELECT id, accountNumber as accountNumber, balance FROM accounts");
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'model\Account');
    }

}
