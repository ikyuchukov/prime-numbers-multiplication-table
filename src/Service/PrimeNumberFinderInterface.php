<?php

namespace App\Service;

interface PrimeNumberFinderInterface
{
    /**
     * @return int[]
     */
    public function find(int $amountOfNumbersToFind): array;
}
