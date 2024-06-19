<?php

namespace model;

/**
 * Handles storing and retrieving account data using flat files.
 */
class FlatFileStorage {
    private $filePath;

    public function __construct($filePath) {
        $this->filePath = $filePath;
    }

    /**
     * Saves account data to a flat file.
     */
    public function saveAccount(Account $account): void
    {
        $data = serialize($account) . PHP_EOL;  // Serialize the account object to a string
        file_put_contents($this->filePath, $data, FILE_APPEND | LOCK_EX);
    }

    /**
     * Reads accounts from the flat file.
     */
    public function readAccounts(): array
    {
        $accounts = [];
        $lines = file($this->filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            $accounts[] = unserialize($line);
        }
        return $accounts;
    }
}
