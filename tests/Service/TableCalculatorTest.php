<?php

namespace App\Tests\UnitTests\Service;

use App\Service\TableCalculator;
use PHPUnit\Framework\TestCase;

class TableCalculatorTest extends TestCase
{
    private TableCalculator $tableCalculator;
    protected function setUp(): void
    {
        $this->tableCalculator = new TableCalculator();
        parent::setUp();
    }

    public function testCalculateTable()
    {
        $expected = [
            2 =>
                [
                    2 => 4,
                    3 => 6,
                    5 => 10,
                ],
            3 =>
                [
                    2 => 6,
                    3 => 9,
                    5 => 15,
                ],
            5 =>
                [
                    2 => 10,
                    3 => 15,
                    5 => 25,
                ],
        ];

        $result = $this->tableCalculator->calculateTable([2, 3, 5]);

        $this->assertEquals($expected, $result);
    }
}
