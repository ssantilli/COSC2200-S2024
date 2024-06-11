<?php

namespace model;

class CheckingAccount extends GenericAccount
{

    private float $transcationFees;

    public function __construct($transcationFees)
    {
        $this->transcationFees = $transcationFees;
    }

    public function calculateFees(): float
    {
        // TODO: Implement calculateFees() method.
        return $this->transcationFees;
    }
}