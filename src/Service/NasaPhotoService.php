<?php

namespace App\Service;

class NasaPhotoService
{
    private $christmasDaysService;

    public function __construct(ChristmasDaysService $christmasDaysService)
    {
        $this->christmasDaysService = $christmasDaysService;
    }

    public function setNasaImageRelatedWithPolishHolidaysToDatabaseByYear(int $year):void
    {
        $holidaysArrayByYear = $this->getPolishHolidaysArrayByYear($year);
    }
}