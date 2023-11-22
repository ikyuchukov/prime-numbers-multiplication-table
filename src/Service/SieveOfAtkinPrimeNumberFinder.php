<?php

namespace App\Service;

/**
 * Sieve Of Atkin algorithm with modifications to work for N number of primes
 *
 * @see https://www.ams.org/journals/mcom/2004-73-246/S0025-5718-03-01501-1/S0025-5718-03-01501-1.pdf
 */
class SieveOfAtkinPrimeNumberFinder implements PrimeNumberFinderInterface
{
    private const KNOWN_PRIMES = [2, 3];

    public function __construct(
        private readonly PrimeNumberApproximateUpperBoundFinder $primeNumberApproximateUpperBoundFinder
    ) {
    }

    public function findPrimeNumbers(int $amountOfNumbersToFind): array
    {
        $numberList = [2 => true, 3 => true];
        $primeNumbers = self::KNOWN_PRIMES;
        $limit = $this->primeNumberApproximateUpperBoundFinder->findUpperBound($amountOfNumbersToFind);
        while (count($primeNumbers) < $amountOfNumbersToFind) {
            for ($x = 1; $x * $x < $limit; $x++) {
                for ($y = 1; $y * $y < $limit; $y++) {
                    $this->attemptFirstFlip($x, $y, $numberList);
                    $this->attemptSecondFlip($x, $y, $numberList);
                    $this->attemptThirdFlip($x, $y, $numberList);
                }
            }

            for ($i = 5; $i * $i <= $limit; $i++) {
                if (isset($numberList[$i]) && $numberList[$i]) {
                    for ($j = $i * $i; $j < $limit; $j += $i * $i) {
                        $numberList[$j] = false;
                    }
                }
            }

            for ($i = 0; $i <= $limit; $i++) {
                if (isset($numberList[$i]) && $numberList[$i]) {
                    if (!in_array($i, $primeNumbers, true)) {
                        $primeNumbers[] = $i;
                    }
                }
            }
        }

        return array_slice($primeNumbers, 0, $amountOfNumbersToFind);
    }

    private function attemptFirstFlip(int $x, int $y, array &$numberList): void
    {
        $number = 4 * $x * $x + $y * $y;
        $modulo = $number % 12;
        if ($modulo === 1 || $modulo === 5) {
            $numberList[$number] = !isset($numberList[$number]) || !$numberList[$number];
        }
    }

    private function attemptSecondFlip(int $x, int $y, array &$numberList): void
    {
        $number = 3 * $x * $x + $y * $y;
        $modulo = $number % 12;
        if ($modulo === 7) {
            $numberList[$number] = !isset($numberList[$number]) || !$numberList[$number];
        }
    }

    private function attemptThirdFlip(int $x, int $y, array &$numberList): void
    {
        $number = 3 * $x * $x - $y * $y;
        $modulo = $number % 12;
        if ($x > $y && $modulo === 11) {
            $numberList[$number] = !isset($numberList[$number]) || !$numberList[$number];
        }
    }
}
