<?php
namespace App\Repository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use App\Entity\Pc;
use App\Entity\SeanceConduite;

/**
 * @method SeanceConduite|null find($id, $lockMode = null, $lockVersion = null)
 * @method SeanceConduite|null findOneBy(array $criteria, array $orderBy = null)
 * @method SeanceConduite[]    findAll()
 * @method SeanceConduite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SeanceConduiteRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, SeanceConduite::class);
    }



    
    // /**
    //  * @return Seanceonduite[] Returns an array of SeanCeonduite objects
    //  */
    

    public function findByCandidatId($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.candidat_id = :val')
            ->setParameter('val', $value)
            //->orderBy('s.id', 'ASC')
            //->setMaxResults(10)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    public function findByVehicule($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.vehicule = :val')
            ->setParameter('val', $value)
            //->orderBy('s.id', 'ASC')
            //->setMaxResults(10)
            ->getQuery()
            ->getResult()
           
        ;
    }
    
    /*
    public function findOneBySomeField($value): ?SeanceConduite
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