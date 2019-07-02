<?php

namespace App\Service;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class NasaPhotoService
{
    private $christmasDaysService;
    private $params;
    private $httpClient;

    public function __construct(
        ChristmasDaysService $christmasDaysService,
        ParameterBagInterface $params,
        HttpClientInterface $httpClient
    )
    {
        $this->christmasDaysService = $christmasDaysService;
        $this->params = $params;
        $this->httpClient = $httpClient;
    }

    public function setNasaImageRelatedWithPolishHolidaysToDatabaseByYear(int $year):void
    {
        $holidaysArrayByYear = $this->christmasDaysService->getPolishHolidaysArrayByYear($year);
    }
}