<?php

namespace App\Service;

use App\Repository\PolishHolidayRepository;
use App\Entity\PolishHoliday;
use \DateTime;

class ChristmasDaysService
{
    private $polishHolidayRepository;

    /**
     * ChristmasDaysService constructor.
     * @param $polishHolidayRepository
     */
    public function __construct(PolishHolidayRepository $polishHolidayRepository)
    {
        $this->polishHolidayRepository = $polishHolidayRepository;
    }


    public function setPolishHolidaysToDatabaseByYear(int $year): void
    {
        $holidaysArrayByYear = $this->getPolishHolidaysArrayByYear($year);

        $this->polishHolidayRepository->drop()->create();

        foreach ($holidaysArrayByYear as $name=>$date) {
            $polishHoliday = $this->getPolishHolidayToPersist($name, $date);

            if ($polishHoliday) {
                $this->polishHolidayRepository->persist($polishHoliday);
            }
        }

        $this->polishHolidayRepository->flush();
    }

    public function getPolishHolidaysArrayByYear(int $year): array
    {
        $holidays = [
            "Nowy Rok" => date('Y-m-d',mktime(0,0,0,1,1,$year)),
            "Trzech Króli" => date('Y-m-d',mktime(0,0,0,1,6,$year)),
            "Wielkanoc" => date('Y-m-d',mktime(0,0,0,3,21+easter_days($year),$year)),
            "Poniedziałek Wielkanocny" => date('Y-m-d',mktime(0,0,0,3,21+easter_days($year)+1,$year)),
            "Święto Pracy" => date('Y-m-d',mktime(0,0,0,5,1,$year)),
            "Święto Konstytucji 3 Maja" => date('Y-m-d',mktime(0,0,0,5,3,$year)),
            "Zesłanie Ducha Świętego" => date('Y-m-d',mktime(0,0,0,3,21+easter_days($year)+49,$year)),
            "Boże Ciało" => date('Y-m-d',mktime(0,0,0,3,21+easter_days($year)+60,$year)),
            "Wniebowzięcie NMP" => date('Y-m-d',mktime(0,0,0,8,15,$year)),
            "Wszystkich Świętych" => date('Y-m-d',mktime(0,0,0,11,1,$year)),
            "Święto Niepodległości" => date('Y-m-d',mktime(0,0,0,11,11,$year)),
            "Boże Narodzenie - pierwszy dzień" => date('Y-m-d',mktime(0,0,0,12,25,$year)),
            "Boże Narodzenie - drugi dzień" => date('Y-m-d',mktime(0,0,0,12,26,$year))
        ];

        return $holidays;
    }

    public function getPolishHolidayToPersist(string $holidayName, string $holidayDate): ?PolishHoliday
    {
        $polishHoliday = new PolishHoliday();

        $polishHoliday
            ->setHolidayName($holidayName)
            ->setHolidayDate(DateTime::createFromFormat('Y-m-d', $holidayDate));

        return $polishHoliday;
    }
}