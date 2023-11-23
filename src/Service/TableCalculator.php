<?php

namespace App\Service;

class TableCalculator
{
    public function calculateTable(array $numbers, string $arithmeticOperation = '*'): array
    {
        $table = [];
        //todo optimize to only do half the calculations
        foreach ($numbers as $number) {
            $table[$number] = [];
            foreach ($numbers as $number2) {
                //sprintf is a lot slower than concat for large number of operations
                $table[$number][$number2] = math_eval($number . $arithmeticOperation . $number2);
            }
        }

        return $table;
    }
}
