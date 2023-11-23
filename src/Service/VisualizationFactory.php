<?php

namespace App\Service;

use App\Entity\Visualization;
use App\VisualizationDto;

class VisualizationFactory
{
    public function createFromDto(VisualizationDto $visualizationDto, string $operation): Visualization
    {
        $visualization = new Visualization();
        $visualization->setNumbers($visualizationDto->getTable()[0] ?? []);
        $visualization->setOperation($operation);
        $visualization->setVisualizationTable($visualizationDto->getTable());

        return $visualization;
    }

}
