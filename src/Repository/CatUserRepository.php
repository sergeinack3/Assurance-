<?php

namespace App\Repository;

use App\Entity\CatUser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CatUser|null find($id, $lockMode = null, $lockVersion = null)
 * @method CatUser|null findOneBy(array $criteria, array $orderBy = null)
 * @method CatUser[]    findAll()
 * @method CatUser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CatUserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CatUser::class);
    }

    // /**
    //  * @return CatUser[] Returns an array of CatUser objects
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
    public function findOneBySomeField($value): ?CatUser
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
