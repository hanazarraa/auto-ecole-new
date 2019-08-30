<?php

namespace App\Repository;

use App\Entity\SeancesVehicules;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method SeancesVehicules|null find($id, $lockMode = null, $lockVersion = null)
 * @method SeancesVehicules|null findOneBy(array $criteria, array $orderBy = null)
 * @method SeancesVehicules[]    findAll()
 * @method SeancesVehicules[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SeancesVehiculesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, SeancesVehicules::class);
    }

    // /**
    //  * @return SeancesVehicules[] Returns an array of SeancesVehicules objects
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
    public function findOneBySomeField($value): ?SeancesVehicules
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
