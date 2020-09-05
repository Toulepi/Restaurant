<?php

namespace App\Repository;

use App\Entity\TableClient;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TableClient|null find($id, $lockMode = null, $lockVersion = null)
 * @method TableClient|null findOneBy(array $criteria, array $orderBy = null)
 * @method TableClient[]    findAll()
 * @method TableClient[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TableClientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TableClient::class);
    }

    // /**
    //  * @return TableClient[] Returns an array of TableClient objects
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
    public function findOneBySomeField($value): ?TableClient
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
