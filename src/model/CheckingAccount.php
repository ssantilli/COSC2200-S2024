<?php

namespace model;

class CheckingAccount extends GenericAccount
{

    private $transcationFees;

    public function __construct($transcationFees)
    {
        $this->transcationFees = $transcationFees;
    }

    public function calculateFees()
    {
        // TODO: Implement calculateFees() method.
        return $this->transcationFees;
    }
}