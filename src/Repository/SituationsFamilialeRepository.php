<?php

namespace App\Repository;

use App\Entity\SituationsFamiliale;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method SituationsFamiliale|null find($id, $lockMode = null, $lockVersion = null)
 * @method SituationsFamiliale|null findOneBy(array $criteria, array $orderBy = null)
 * @method SituationsFamiliale[]    findAll()
 * @method SituationsFamiliale[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SituationsFamilialeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SituationsFamiliale::class);
    }

    // /**
    //  * @return SituationsFamiliale[] Returns an array of SituationsFamiliale objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SituationsFamiliale
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
