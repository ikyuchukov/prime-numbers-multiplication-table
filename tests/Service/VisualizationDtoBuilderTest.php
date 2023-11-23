<?php

namespace App\Tests\UnitTests\Service;

use App\Service\PrimeNumberApproximateUpperBoundFinder;
use App\Service\TableCalculator;
use App\Service\VisualizationDtoBuilder;
use App\Service\VisualizationFactory;
use App\VisualizationDto;
use PHPUnit\Framework\TestCase;

class VisualizationDtoBuilderTest extends TestCase
{
    private VisualizationDtoBuilder $visualizationDtoBuilder;
    protected function setUp(): void
    {
        $this->visualizationDtoBuilder = new VisualizationDtoBuilder();
        parent::setUp();
    }

    public function testBuildVisualizationDto()
    {
        $table = [
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

        $result = $this->visualizationDtoBuilder->buildVisualizationDto([2, 3, 5], $table);

        $expected = new VisualizationDto([
            [' ', 2, 3, 5],
            [2, 4, 6, 10],
            [3, 6, 9, 15],
            [5, 10, 15, 25],
        ]);

        $this->assertEquals($expected, $result);
    }
}
