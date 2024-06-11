<?php

namespace tests;

use model\SavingsAccount;
use PHPUnit\Framework\TestCase;

class SavingsAccountTest extends TestCase
{

    private SavingsAccount $account;

    protected function setUp(): void
    {
        //set up a SavingsAccount with initial balance and interest rate
        $this->account =  new SavingsAccount("Jane Doe", 67890, 2000, 2);
    }

    public function testApplyInterest() {
        //test interest application
        $this->account->applyInterestRate();
        $this->assertEquals(2040,
            $this->account->getBalance(), "Balance should be 2040 after applying 2% interest");
    }




}