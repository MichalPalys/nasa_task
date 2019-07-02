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

    public function persist(NasaPhoto $nasaPhoto)
    {
        $this->_em->persist($nasaPhoto);
    }

    public function flush()
    {
        $this->_em->flush();
    }

    public function truncate(): self
    {
        $sql = 'TRUNCATE nasa_photo';
        $this->_em->getConnection()->prepare($sql)->execute();

        return $this;
    }

    public function drop(): self
    {
        $sql = 'DROP TABLE nasa_photo';
        $this->_em->getConnection()->prepare($sql)->execute();

        return $this;
    }

    public function create(): self
    {
        $sql = 'CREATE TABLE nasa_photo (id INT AUTO_INCREMENT NOT NULL, nasa_id INT NOT NULL, url VARCHAR(255) NOT NULL, earth_date DATE NOT NULL, rover VARCHAR(255) NOT NULL, camera VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ENGINE = InnoDB';
        $this->_em->getConnection()->prepare($sql)->execute();

        return $this;
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
