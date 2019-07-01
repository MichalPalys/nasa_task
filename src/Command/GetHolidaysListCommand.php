<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use App\Service\ChristmasDaysService;

class GetHolidaysListCommand extends Command
{
    const DEFAULT_YEAR = 2018;

    protected static $defaultName = 'app:get-holidays-list';
    private $christmasService;

    public function __construct(ChristmasDaysService $christmasService)
    {
        $this->christmasService = $christmasService;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setDescription('Add a short description for your command')
            ->addOption('year', null, InputOption::VALUE_REQUIRED, 'Input year', self::DEFAULT_YEAR)
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        $year = $input->getOption('year');
        $year = intval($year);

        if ($year < 1970 || $year > 2037) {
            $io->error('Date is outside the range of Unix timestamps (i.e. before 1970 or after 2037)');
        } else {

            if ($year == self::DEFAULT_YEAR) {
                $io->note(sprintf('This is default option: --year=%s', $year));
            } else {
                $io->note(sprintf('You passed an option: --year=%s', $year));
            }
            $this->christmasService->setPolishHolidaysToDatabaseByYear($year);

            $io->success('Done.');
        }
    }
}
