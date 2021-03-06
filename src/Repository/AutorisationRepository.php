<?php

namespace App\Repository;

use App\Entity\Autorisation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Autorisation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Autorisation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Autorisation[]    findAll()
 * @method Autorisation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AutorisationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Autorisation::class);
    }

    // /**
    //  * @return Autorisation[] Returns an array of Autorisation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Autorisation
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function findLastOneByType($type): ?Autorisation
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.type = :type')
            ->setParameter('type', $type)
            ->orderBy('a.id','DESC')
            ->getQuery()
            ->setMaxResults(1)
            ->getOneOrNullResult()
        ;
    }

    public function findLastThreeByType($type): ?array
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.type = :type')
            ->setParameter('type', $type)
            ->orderBy('a.id','DESC')
            ->getQuery()
            ->setMaxResults(3)
            ->getResult()
        ;
    }
}
