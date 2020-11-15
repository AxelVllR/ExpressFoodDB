<?php

namespace App\Repository;

use App\Entity\InfoBancaire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method InfoBancaire|null find($id, $lockMode = null, $lockVersion = null)
 * @method InfoBancaire|null findOneBy(array $criteria, array $orderBy = null)
 * @method InfoBancaire[]    findAll()
 * @method InfoBancaire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InfoBancaireRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InfoBancaire::class);
    }

    // /**
    //  * @return InfoBancaire[] Returns an array of InfoBancaire objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?InfoBancaire
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
