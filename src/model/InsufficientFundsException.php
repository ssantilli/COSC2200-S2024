<?php

namespace model;

use Throwable;

class InsufficientFundsException extends \Exception
{
    public function __construct(string $message = "Insufficient funds for this transaction",
                                int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function __toString() : string {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }

}