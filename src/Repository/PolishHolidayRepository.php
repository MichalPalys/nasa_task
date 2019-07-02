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

    public function persist(PolishHoliday $polishHoliday)
    {
        $this->_em->persist($polishHoliday);
    }

    public function flush()
    {
        $this->_em->flush();
    }

    public function truncate(): self
    {
        $sql = 'TRUNCATE polish_holiday';
        $this->_em->getConnection()->prepare($sql)->execute();

        return $this;
    }

    public function drop(): self
    {
        $sql = 'DROP TABLE polish_holiday';
        $this->_em->getConnection()->prepare($sql)->execute();

        return $this;
    }

    public function create(): self
    {
        $sql = 'CREATE TABLE polish_holiday (id INT AUTO_INCREMENT NOT NULL, holiday_date DATE NOT NULL, holiday_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ENGINE = InnoDB';
        $this->_em->getConnection()->prepare($sql)->execute();

        return $this;
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
