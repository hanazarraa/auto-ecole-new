<?php

namespace App\Repository;

use App\Entity\SeancesMoniteur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method SeancesMoniteur|null find($id, $lockMode = null, $lockVersion = null)
 * @method SeancesMoniteur|null findOneBy(array $criteria, array $orderBy = null)
 * @method SeancesMoniteur[]    findAll()
 * @method SeancesMoniteur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SeancesMoniteurRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, SeancesMoniteur::class);
    }

    // /**
    //  * @return SeancesMoniteur[] Returns an array of SeancesMoniteur objects
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
    public function findOneBySomeField($value): ?SeancesMoniteur
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
