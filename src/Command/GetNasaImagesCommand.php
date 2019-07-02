<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use App\Service\NasaPhotoService;

class GetNasaImagesCommand extends Command
{
    protected static $defaultName = 'app:get-nasa-images';
    private $nasaPhotoService;

    public function __construct(NasaPhotoService $nasaPhotoService)
    {
        $this->nasaPhotoService = $nasaPhotoService;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setDescription('Save to database nasa image data related with Polish Holidays, default year 2018')
            ->addOption('year', null, InputOption::VALUE_REQUIRED, 'Input year', self::DEFAULT_YEAR)
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

    }
}
