<?php

namespace App\Tests\UnitTests\Service;

use App\Entity\Visualization;
use App\Service\VisualizationFactory;
use App\VisualizationDto;
use PHPUnit\Framework\TestCase;

class VisualizationFactoryTest extends TestCase
{
    private VisualizationFactory $visualizationFactory;
    protected function setUp(): void
    {
        $this->visualizationFactory = new VisualizationFactory();
        parent::setUp();
    }

    public function testCreateFromDto()
    {
        $visualizationDto = new VisualizationDto([
            [' ', 2, 3, 5],
            [2, 4, 6, 10],
            [3, 6, 9, 15],
            [5, 10, 15, 25],
        ]);

        $result = $this->visualizationFactory->createFromDto($visualizationDto, '*');

        $expectedVisualization = new Visualization();
        $expectedVisualization->setNumbers([2, 3, 5]);
        $expectedVisualization->setOperation('*');
        $expectedVisualization->setVisualizationTable([
            [' ', 2, 3, 5],
            [2, 4, 6, 10],
            [3, 6, 9, 15],
            [5, 10, 15, 25],
        ]);

        $this->assertEquals($expectedVisualization, $result);
    }
}
