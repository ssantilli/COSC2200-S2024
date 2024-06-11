<?php

namespace tests;

use model\InsufficientFundsException;
use model\PersonalAccount;
use PHPUnit\Framework\TestCase;

class PersonalAccountTest extends TestCase
{

    private PersonalAccount $account;

    protected function setUp(): void {
        //set up a PersonalAccount with initial balance
        $this->account = new PersonalAccount("John Doe", 12345, 1000);
    }

    public function testDeposit(){
        //test depositing a positive amount
        $this->account->deposit(500);
        $this->assertEquals(500, $this->account->getBalance(),
            "Balance should be 1500 after depositing 500");
    }

    /**
     * @throws InsufficientFundsException
     */
    public function testWithdraw(){
        //test withdrawing an amount less than the balance
        $this->account->withdraw(200);
        $this->assertEquals(800, $this->account->getBalance(),
            "Balance should be 800 after withdrawing 200");
    }

    public function testWithdrawMoreThanBalance(){
        //Expect an exception when trying toi withdraw more than the balance
        $this->expectException(InsufficientFundsException::class);
        $this->account->withdraw(1200);
    }



}