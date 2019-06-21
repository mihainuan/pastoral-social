<?php

namespace App\Repository;

use App\Entity\Cesta;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Cesta|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cesta|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cesta[]    findAll()
 * @method Cesta[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CestaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Cesta::class);
    }

    // /**
    //  * @return Cesta[] Returns an array of Cesta objects
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
    public function findOneBySomeField($value): ?Cesta
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
