<?php

namespace App\Repository;

use App\Entity\Produit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Produit|null find($id, $lockMode = null, $lockVersion = null)
 * @method Produit|null findOneBy(array $criteria, array $orderBy = null)
 * @method Produit[]    findAll()
 * @method Produit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProduitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Produit::class);
    }

    /**
     * @return Produit[] Returns an array of Produit objects
     */
    public function findByWord($value)
    {
        $query = $this->createQueryBuilder('pdt')  // cette ligne correspond à "Select 'p' From Produit"
            ->where('pdt.nom_produit LIKE :key')   // recherche des nom de produit par clé (key)
//            ->setMaxResults('10')
            ->setParameter('key', '%' . $value . '%')  // format de la clé de recherche
            ->getQuery();
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.nom_produit = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult();
        return $query->getResult();
    }

    /**
     * @return Produit[]
     */
    public function findByCat($term)
    {
        $query = $this->createQueryBuilder('pdt')
            ->innerJoin('pdt.categorie', 'cat')
            ->andWhere('cat.nom_catg LIKE :key')
            ->setParameter('key', '%' . $term . '%')
            ->getQuery();
        return $query->getResult();
    }

    public function findOneBySomeField($value): ?Produit
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult();
    }

}
