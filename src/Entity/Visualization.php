<?php

namespace App\Entity;

use App\Repository\VisualizationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VisualizationRepository::class)]
class Visualization
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::SIMPLE_ARRAY)]
    private array $numbers = [];

    #[ORM\Column(length: 255)]
    private ?string $operation = null;

    #[ORM\Column(type: Types::JSON)]
    private array $visualizationTable = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumbers(): array
    {
        return $this->numbers;
    }

    public function setNumbers(array $numbers): static
    {
        $this->numbers = $numbers;

        return $this;
    }

    public function getOperation(): ?string
    {
        return $this->operation;
    }

    public function setOperation(string $operation): static
    {
        $this->operation = $operation;

        return $this;
    }

    public function getVisualizationTable(): array
    {
        return $this->visualizationTable;
    }

    public function setVisualizationTable(array $visualizationTable): static
    {
        $this->visualizationTable = $visualizationTable;

        return $this;
    }
}
