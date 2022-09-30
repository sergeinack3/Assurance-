<?php

namespace App\Repository;

use App\Entity\TypeEmprunt;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TypeEmprunt|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeEmprunt|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeEmprunt[]    findAll()
 * @method TypeEmprunt[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeEmpruntRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeEmprunt::class);
    }

    // /**
    //  * @return TypeEmprunt[] Returns an array of TypeEmprunt objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TypeEmprunt
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
