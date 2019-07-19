<?php

namespace App\Service;

use DateTime;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use App\Repository\NasaPhotoRepository;
use App\Entity\NasaPhoto;
use Doctrine\ORM\EntityNotFoundException;

final class NasaPhotoService
{
    private $christmasDaysService;
    private $params;
    private $httpClient;
    private $nasaPhotoRepository;

    public function __construct(
        ChristmasDaysService $christmasDaysService,
        ParameterBagInterface $params,
        HttpClientInterface $httpClient,
        NasaPhotoRepository $nasaPhotoRepository
    )
    {
        $this->christmasDaysService = $christmasDaysService;
        $this->params = $params;
        $this->httpClient = $httpClient;
        $this->nasaPhotoRepository = $nasaPhotoRepository;
    }

    /**
     * @param int photoId
     * @return NasaPhoto
     * @throws EntityNotFoundException
     */
    public function getArticle(int $photoId): NasaPhoto
    {
        $nasaPhoto = $this->nasaPhotoRepository->findOneBy(['nasaId' => $photoId]);

        if (!$nasaPhoto) {
            throw new EntityNotFoundException('Photo with id '.$photoId.' does not exist!');
        }

        return $nasaPhoto;
    }

    public function setNasaImageRelatedWithPolishHolidaysToDatabaseByYear(int $year):void
    {
        $holidaysArrayByYear = $this->christmasDaysService->getPolishHolidaysArrayByYear($year);

        $this->nasaPhotoRepository->drop()->create();

        $url = $this->params->get('nasa_url');
        $nasaApiKey = $this->params->get('nasa_api_key');
        $rovers = ['spirit', 'opportunity', 'curiosity'];

        foreach ($holidaysArrayByYear as $name=>$date) {
            foreach ($rovers as $rover) {
                try {
                    $response = $this->httpClient->request('GET', $url . '/' . $rover . '/photos', [
                        'query' => [
                            'earth_date' => $date,
                            'api_key' => $nasaApiKey,
                        ],
                    ]);

                    $photosArray = $response->toArray()['photos'];

                    if (!empty($photosArray)) {

                        foreach ($photosArray as $item) {
            //                $content = var_dump($item['id']);
            //                $content = var_dump($item['img_src']);
            //                $content = var_dump($item['earth_date']);
            //                $content = var_dump($item['rover']['name']);
            //                $content = var_dump($item['camera']['name']);

                            $nasaPhoto = $this->getNasaImageToPersist(
                                $item['id'],
                                $item['img_src'],
                                $item['earth_date'],
                                $item['rover']['name'],
                                $item['camera']['name']
                            );

                            if ($nasaPhoto) {
                                $this->nasaPhotoRepository->persist($nasaPhoto);
                            }

                        }

                        $this->nasaPhotoRepository->flush();

                    }

                } catch (TransportExceptionInterface $e) {
                }
            }

        }
    }

    public function getNasaImageToPersist(int $nasaId, string $url, string $date, string $rover, string $camera): NasaPhoto
    {
        $nasaPhoto = new NasaPhoto();

        $nasaPhoto
            ->setNasaId($nasaId)
            ->setUrl($url)
            ->setEarthDate(DateTime::createFromFormat('Y-m-d', $date))
            ->setRover($rover)
            ->setCamera($camera)
        ;

        return $nasaPhoto;
    }
}