<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    // /**
    //  * @return User[] Returns an array of User objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?User
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
   public function findAllCustomized()
    {
        return $this->createQueryBuilder('u')
            ->select('u.nom,u.prenom_1,u.nom_ar,u.prenom_ar1,u.som')
            ->getQuery()
            ->getResult();
    }

    public function findOneBySOM($som)
    {

//
//        $entityManager = $this->getEntityManager();
//
//        $query = $entityManager->createQuery(
//            'SELECT u.nom,u.prenom_1,u.nom_ar,u.prenom_ar1,u.som,u.date_naissance,u.date_recrutement,c.title FROM App\Entity\Situation s  INNER JOIN App\Entity\Cadre c  WHERE u.som = :som ')->setParameter('som', $som);
//
//        return $query->getOneOrNullResult();
        return $this->createQueryBuilder('u')
            ->andWhere('u.som = :som')
            ->setParameter('som', $som)
            ->getQuery()
            ->getResult();
    }
}
