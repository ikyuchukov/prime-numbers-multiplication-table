<?php
declare(strict_types=1);

namespace App\Command;

use App\Service\PrimeNumberFinder;
use App\Service\SieveOfAtkinPrimeNumberFinder;
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

    public function __construct(private readonly SieveOfAtkinPrimeNumberFinder $primeNumberFinder)
    {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->setHelp('This command allows you to generate a multiplication table of the first N prime numbers.')
            ->addArgument('number', InputArgument::REQUIRED, 'The number of prime numbers to generate.')
            ->addOption('operation', null, InputArgument::OPTIONAL, 'The operation to perform on the prime numbers.', self::DEFAULT_OPERATION)
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $primeNumbers = $this->primeNumberFinder->findPrimeNumbers((int) $input->getArgument('number'));
        $multiplicationTable = $t

        $output->writeln([
            'Prime Multiplication Table',
            '===========================',
            '',
            $input->getArgument('number'),
            $input->getOption('operation'),
        ]);
        $output->writeln($primeNumbers);

        return Command::SUCCESS;
    }


}
