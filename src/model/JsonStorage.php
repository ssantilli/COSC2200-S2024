<?php

namespace model;

/**
 * Manages account data using JSON storage.
 */
class JsonStorage {
    private $filePath;

    public function __construct($filePath) {
        $this->filePath = $filePath;
    }

    /**
     * Saves account data as JSON.
     */
    public function saveAccount(Account $account): void
    {
        $data = json_encode($account, JSON_PRETTY_PRINT);
        file_put_contents($this->filePath, $data . PHP_EOL, FILE_APPEND | LOCK_EX);
    }

    /**
     * Reads accounts from a JSON file.
     */
    public function readAccounts() {
        $json = file_get_contents($this->filePath);
        return json_decode($json, true); // Returns an associative array
    }
}
