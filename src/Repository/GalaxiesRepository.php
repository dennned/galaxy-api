<?php

namespace App\Repository;

use App\Entity\Galaxies;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Galaxies|null find($id, $lockMode = null, $lockVersion = null)
 * @method Galaxies|null findOneBy(array $criteria, array $orderBy = null)
 * @method Galaxies[]    findAll()
 * @method Galaxies[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GalaxiesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Galaxies::class);
    }

    // /**
    //  * @return Galaxies[] Returns an array of Galaxies objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Galaxies
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
