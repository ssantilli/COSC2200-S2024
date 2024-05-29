<?php
namespace model;

/**
 * We simulate the concept of generics using doc comments.
 * Assume Transaction is a class that encapsulates transaction details.
 */
abstract class GenericAccount
{
    /**
     * Calculate fees based on a transaction.
     *
     *  Example (Assume):
     *  param Transaction $transaction --> Details about the transaction for which fees need to be calculated.
     *  abstract public function calculateFees($transaction);
     *  return float --> The calculated fee.
     *
     */
    abstract public function calculateFees(); // Method that could hypothetically use T
}