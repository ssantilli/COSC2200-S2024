<?php

namespace interface;

/**
 * WEEK 4
 * Interface for transaction behaviors.
 * In a generics-supported language, we might define it as Transactable<T> where T is the transaction type.
 */
interface Transactable
{
    /**
     * WEEK 4
     * Simulate a generic method for depositing.
     * @param mixed $amount - In a generic language, this could be T
     */
    public function deposit($amount);

    /**
     * WEEK 4
     * Simulate a generic method for withdrawing.
     * @param mixed $amount - In a generic language, this could be T
     */
    public function withdraw($amount);

}