<?php

namespace App;

readonly class VisualizationDto
{

    /**
     * @param int[][]|string[][] $table
     */
    public function __construct(private array $table)
    {
    }

    public function getTable(): array
    {
        return $this->table;
    }
}
