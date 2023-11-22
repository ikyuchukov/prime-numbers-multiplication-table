<?php

namespace App\Service;

/**
 * Finds an approximate upper bound for the nth prime number
 * @see https://en.wikipedia.org/wiki/Prime_number_theorem#Approximations_for_the_nth_prime_number
 */
class PrimeNumberApproximateUpperBoundFinder
{
    public function findUpperBound(int $nthNumber): int
    {
        return (int) ceil($nthNumber * log($nthNumber) + $nthNumber * log(log($nthNumber)));
    }

}
