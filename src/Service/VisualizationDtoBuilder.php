<?php

namespace App\Service;

use App\VisualizationDto;

class VisualizationDtoBuilder
{
    public function buildVisualizationDto(array $rowAndColumnNumbers, array $table): VisualizationDto
    {
        $visualizationTable = [];
        //we set the initial row
        $visualizationTable[] = [' ', ...$rowAndColumnNumbers];

        foreach ($rowAndColumnNumbers as $rowNumber) {
            $visualizationTable[] = $this->buildRow($rowNumber, $table);
        }

        return new VisualizationDto(
            $visualizationTable
        );

    }

    /**
     * @param string|int $rowNumber
     * @param array $table
     *
     * @return array
     */
    private function buildRow(mixed $rowNumber, array $table): array
    {
        $row = [];
        $row[] = $rowNumber;
        foreach ($table[$rowNumber] as $value) {
            $row[] = $value;
        }

        return $row;
    }

}
