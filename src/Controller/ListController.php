<?php

namespace App\Controller;

use DateTime;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\Annotations\QueryParam;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Request\ParamFetcherInterface;
use App\Repository\NasaPhotoRepository;

class ListController extends AbstractFOSRestController
{
    private $nasaPhotoRepository;

    public function __construct(NasaPhotoRepository $nasaPhotoRepository)
    {
        $this->nasaPhotoRepository = $nasaPhotoRepository;
    }

    /**
     * @param ParamFetcherInterface  $paramFetcher
     * @param string $date
     *
     * @return \FOS\RestBundle\View\View
     *
     * @QueryParam(name="date", strict=true, nullable=true, description="Specific date.")
     * @QueryParam(name="from", strict=true, nullable=true, description="Specific date from.")
     * @QueryParam(name="to", strict=true, nullable=true, description="Specific date to.")
     * @QueryParam(name="rover", strict=true, nullable=true, description="Specific rover name.")
     * @QueryParam(name="camera", strict=true, nullable=true, description="Specific camera name.")
     */
    public function getListAction(ParamFetcherInterface $paramFetcher)
    {
        $date = $paramFetcher->get('date');
        $from = $paramFetcher->get('from');
        $to = $paramFetcher->get('to');
        $rover = $paramFetcher->get('rover');
        $camera = $paramFetcher->get('camera');

        if ($date != null) {
            $date = DateTime::createFromFormat('Y-m-d', $date);

            $data = $this->nasaPhotoRepository->findBy(['earthDate' => $date]);
        }

        if ($from != null && $to != null) {
            $from = DateTime::createFromFormat('Y-m-d', $from);
            $to = DateTime::createFromFormat('Y-m-d', $to);

            $data = $this->nasaPhotoRepository->findByDateRange($from, $to);
        }

        if ($rover != null && $camera != null) {
            $data = $this->nasaPhotoRepository->findBy(['camera' => $camera, 'rover' => $rover]);
        } elseif ($rover != null) {
            $data = $this->nasaPhotoRepository->findBy(['rover' => $rover]);
        } elseif ($camera != null) {
            $data = $this->nasaPhotoRepository->findBy(['camera' => $camera]);
        }

        if (!$date && !$from && !$to && !$rover && !$camera) {
            $data = $this->nasaPhotoRepository->findAll();
        }

        return $this->view($data, Response::HTTP_OK);
    }

    /**
     * Retrieves an Photo resource
     * @Rest\Get("/photo/{photoId}", name="get_photo")
     * @param int $photoId
     * @return \FOS\RestBundle\View\View
     */
    public function getPhoto(int $photoId)
    {
        $data = $this->nasaPhotoRepository->findOneBy(['nasaId' => $photoId]);
//var_dump($id);
        return $this->view($data, Response::HTTP_OK);
    }
}
