<?php

namespace App\Repository;

use App\Entity\EntreeDessert;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EntreeDessert|null find($id, $lockMode = null, $lockVersion = null)
 * @method EntreeDessert|null findOneBy(array $criteria, array $orderBy = null)
 * @method EntreeDessert[]    findAll()
 * @method EntreeDessert[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EntreeDessertRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EntreeDessert::class);
    }

    // /**
    //  * @return EntreeDessert[] Returns an array of EntreeDessert objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EntreeDessert
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
