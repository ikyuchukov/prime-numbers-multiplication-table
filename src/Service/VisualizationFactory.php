<?php

namespace App\Service;

use App\Entity\Visualization;
use App\VisualizationDto;

class VisualizationFactory
{
    public function createFromDto(VisualizationDto $visualizationDto, string $operation): Visualization
    {
        $visualization = new Visualization();
        $visualization->setNumbers(
            isset($visualizationDto->getTable()[0])
            && is_array($visualizationDto->getTable()[0])
            ? array_splice($visualizationDto->getTable()[0], 1)
            : []
        );
        $visualization->setOperation($operation);
        $visualization->setVisualizationTable($visualizationDto->getTable());

        return $visualization;
    }

}
