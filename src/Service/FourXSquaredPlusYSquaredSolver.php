<?php

namespace App\Service;

/**
 * Solves the equation 4x^2 + y^2 = n
 */
class SieveOfAtkinFirstFunctionSolver
{
    public function getCountOfSolutions(int $n): int
    {
        $count = 0;
        for ($x = 1; $x * $x < $n; $x++) {
            for ($y = 1; $y * $y < $n; $y++) {
                if (4 * $x * $x + $y * $y === $n) {
                    $count++;
                }
            }
        }

        return $count;
    }

}
