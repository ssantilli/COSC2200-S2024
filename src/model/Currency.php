<?php

namespace model;

class Currency
{
    private float $amount;

    public function __construct($amount){
        $this->amount = $amount;
    }

    public function toCAD(): float
    {
        return $this->amount * 1.4;   //Assuming this converts from USD to CAD
    }

    public function fromCAD(): float
    {
        return $this->amount / 1.4;    //Assuming convert back to CAD to USD
    }

}