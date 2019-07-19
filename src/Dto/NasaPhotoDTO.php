<?php

namespace App\Dto;

use Symfony\Component\Validator\Constraints as Assert;

final class NasaPhotoDTO
{
    /**
     * @var $id
     */
    private $id;

    /**
     * @Assert\NotBlank()
     * @Assert\GreaterThan(0)
     * @var int
     */
    private $nasaId;

    /**
     * @Assert\NotBlank()
     * @Assert\Url(relativeProtocol = true)
     * @var string
     */
    private $url;

    /**
     * @Assert\Date
     * @var string A "Y-m-d" formatted value
     */
    private $earthDate;

    /**
     * @Assert\Length(max="255")
     * @var string
     */
    private $rover;

    /**
     * @Assert\Length(max="255")
     * @var string
     */
    private $camera;
}