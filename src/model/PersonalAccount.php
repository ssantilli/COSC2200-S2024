<?php

class PersonalAccount extends Account implements \interface\Transactable
{

    public function deposit($amount)
    {
        // TODO: Implement deposit() method.
        $this->updateBalance($amount);
    }

    public function withdraw($amount)
    {
        // TODO: Implement withdraw() method.
        if($amount<=$this->balance)
        {
           $this->updateBalance(-$amount);
        }else{
            echo "Insufficient funds wto withdraw {$amount}\n";
        }
    }
}