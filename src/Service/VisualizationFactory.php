<?php

namespace App\Service;

use App\VisualizationDto;

class VisualizationFactory
{
    public function createFromDto(VisualizationDto $visualizationDto)
    {
        $table = $visualizationDto->getTable();
        $tableString = '';
        foreach ($table as $row) {
            $tableString .= implode(' ', $row) . PHP_EOL;
        }

        return $tableString;
    }

}
