<?php

namespace App\Repository;

use App\Entity\CurrentSubstance;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CurrentSubstance|null find($id, $lockMode = null, $lockVersion = null)
 * @method CurrentSubstance|null findOneBy(array $criteria, array $orderBy = null)
 * @method CurrentSubstance[]    findAll()
 * @method CurrentSubstance[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CurrentSubstanceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CurrentSubstance::class);
    }

    // /**
    //  * @return CurrentSubstance[] Returns an array of CurrentSubstance objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CurrentSubstance
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
