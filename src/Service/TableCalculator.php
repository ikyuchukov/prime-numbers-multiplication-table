<?php

namespace App\Service;

class TableCalculator
{
    public function calculateTable(array $numbers, string $arithmeticOperation = '*'): array
    {
        $table = [];
        foreach ($numbers as $number) {
            $table[$number] = [];
            foreach ($numbers as $number2) {
                $table[$number][$number2] = $number . $arithmeticOperation . $number2;
            }
        }

        return $table;
    }
}
