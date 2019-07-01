<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PolishHolidayRepository")
 */
class PolishHoliday
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $holidayDate;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $holidayName;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHolidayDate(): ?\DateTimeInterface
    {
        return $this->holidayDate;
    }

    public function setHolidayDate(\DateTimeInterface $holidayDate): self
    {
        $this->holidayDate = $holidayDate;

        return $this;
    }

    public function getHolidayName(): ?string
    {
        return $this->holidayName;
    }

    public function setHolidayName(string $holidayName): self
    {
        $this->holidayName = $holidayName;

        return $this;
    }
}
