<?php

namespace App\Service;

class NasaPhotoService
{
    const NASA_API_KEY = 'Sbv5s6dIrDFORvwehbuN3cdUVTVAbbZO4mbch3mi';

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