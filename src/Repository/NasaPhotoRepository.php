<?php

namespace App\Repository;

use App\Entity\NasaPhoto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method NasaPhoto|null find($id, $lockMode = null, $lockVersion = null)
 * @method NasaPhoto|null findOneBy(array $criteria, array $orderBy = null)
 * @method NasaPhoto[]    findAll()
 * @method NasaPhoto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NasaPhotoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, NasaPhoto::class);
    }

    // /**
    //  * @return NasaPhoto[] Returns an array of NasaPhoto objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?NasaPhoto
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
