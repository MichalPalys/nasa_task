<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NasaPhotoRepository")
 */
class NasaPhoto
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $nasaId;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $url;

    /**
     * @ORM\Column(type="date")
     */
    private $earthDate;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $rover;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $camera;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNasaId(): ?int
    {
        return $this->nasaId;
    }

    public function setNasaId(int $nasaId): self
    {
        $this->nasaId = $nasaId;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getEarthDate(): ?\DateTimeInterface
    {
        return $this->earthDate;
    }

    public function setEarthDate(\DateTimeInterface $earthDate): self
    {
        $this->earthDate = $earthDate;

        return $this;
    }

    public function getRover(): ?string
    {
        return $this->rover;
    }

    public function setRover(string $rover): self
    {
        $this->rover = $rover;

        return $this;
    }

    public function getCamera(): ?string
    {
        return $this->camera;
    }

    public function setCamera(string $camera): self
    {
        $this->camera = $camera;

        return $this;
    }
}
