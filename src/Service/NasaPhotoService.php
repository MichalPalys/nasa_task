<?php

namespace App\Service;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class NasaPhotoService
{
    private $christmasDaysService;
    private $params;

    public function __construct(ChristmasDaysService $christmasDaysService, ParameterBagInterface $params)
    {
        $this->christmasDaysService = $christmasDaysService;
        $this->params = $params;
    }

    public function setNasaImageRelatedWithPolishHolidaysToDatabaseByYear(int $year):void
    {
        $holidaysArrayByYear = $this->christmasDaysService->getPolishHolidaysArrayByYear($year);
    }
}