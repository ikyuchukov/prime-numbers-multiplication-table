<?php

namespace App\Service;

interface PrimeNumberFinderInterface
{
    /**
     * @return int[]
     */
    public function findPrimeNumbers(int $amountOfNumbersToFind): array;
}
