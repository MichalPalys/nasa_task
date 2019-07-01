<?php

namespace App\Repository;

use App\Entity\PolishHoliday;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method PolishHoliday|null find($id, $lockMode = null, $lockVersion = null)
 * @method PolishHoliday|null findOneBy(array $criteria, array $orderBy = null)
 * @method PolishHoliday[]    findAll()
 * @method PolishHoliday[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PolishHolidayRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PolishHoliday::class);
    }

    // /**
    //  * @return PolishHoliday[] Returns an array of PolishHoliday objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PolishHoliday
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
