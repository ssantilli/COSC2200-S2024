<?php
namespace model;
abstract class GenericAccount
{
    /**
     * WEEK 4
     * GenericAccount<T>
     * Here T would represent a type of transaction or account detail.
     * In PHP, we simulate this by specifying the types in doc comments.
     */
    abstract public function calculateFees(); // Method that could hypothetically use T
}