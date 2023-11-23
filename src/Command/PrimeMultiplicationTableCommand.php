<?php
declare(strict_types=1);

namespace App\Command;

use App\Service\SieveOfAtkinPrimeNumberFinder;
use App\Service\TableCalculator;
use App\Service\VisualizationDtoBuilder;
use App\Service\VisualizationFactory;
use App\VisualizationDto;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:prime-multiplication-table',
    description: 'Generate a multiplication table of the first N prime numbers.',
    hidden: false,
    aliases: ['pmt']
)]
class PrimeMultiplicationTableCommand extends Command
{
    private const DEFAULT_OPERATION = '*';

    public function __construct(
        //todo change this to interface
        private readonly SieveOfAtkinPrimeNumberFinder $primeNumberFinder,
        private readonly TableCalculator $tableCalculator,
        private readonly EntityManagerInterface $entityManager,
        private readonly VisualizationDtoBuilder $visualisationDtoBuilder,
        private readonly VisualizationFactory $visualizationFactory,
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->setHelp('This command allows you to generate a multiplication table of the first N prime numbers.')
            ->addArgument('number', InputArgument::REQUIRED, 'The number of prime numbers to generate.')
            ->addArgument('no-table', InputArgument::OPTIONAL, 'Do not show the multiplication table', false)
            ->addOption('operation', 'o', InputArgument::OPTIONAL, 'The operation to perform on the prime numbers.', self::DEFAULT_OPERATION)
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $primeNumbers = $this->primeNumberFinder->findPrimeNumbers((int) $input->getArgument('number'));

        if ((bool) $input->getArgument('no-table') === true) {
            foreach ($primeNumbers as $primeNumber) {
                $output->write($primeNumber . ' ');
            }
            return Command::SUCCESS;
        }

        $calculatedTable = $this->tableCalculator->calculateTable($primeNumbers, $input->getOption('operation'));
        $visualizationDto = $this->visualisationDtoBuilder->buildVisualizationDto($primeNumbers, $calculatedTable);

        $this->entityManager->persist($this->visualizationFactory->createFromDto($visualizationDto, $input->getOption('operation')));
        $this->entityManager->flush();

        $this->showTable($visualizationDto, $output);

        return Command::SUCCESS;
    }

    private function showTable(VisualizationDto $visualizationDto, OutputInterface $output): void
    {
        foreach ($visualizationDto->getTable() as $row) {
            $output->writeln(implode(' ', $row));
        }
    }
}
