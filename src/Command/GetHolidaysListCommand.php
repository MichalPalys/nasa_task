<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class GetHolidaysListCommand extends Command
{
    protected static $defaultName = 'app:get-holidays-list';
    const DEFAULT_YEAR = 2018;

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

        if ($year == self::DEFAULT_YEAR) {
            $io->note(sprintf('This is default option: %s', $year));
        } else {
            $io->note(sprintf('You passed an option: %s', $year));
        }

        $io->success('Done.');
    }
}
