<?php
namespace App\Repository;
use App\Entity\SeanceCode;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use App\Entity\Pc;

/**
 * @method SeanceCode|null find($id, $lockMode = null, $lockVersion = null)
 * @method SeanceCode|null findOneBy(array $criteria, array $orderBy = null)
 * @method SeanceCde[]    findAll()
 * @method SeanceCode[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SeanceCodeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, SeanceCode::class);
    }
    // /**
    //  * @return Seanceode[] Returns an array of SeanCeode objects
    //  */
    
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere("s.fin->format('H:i:s') > :val")
            ->setParameter('val', $value->format('H:i:s'))
            
            ->getQuery()
            ->getResult()
        ;
    }
    
    /*
    public function findOneBySomeField($value): ?Seance
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    /*public function findAllPcDispo(): bool
{
    $entityManager = $this->getEntityManager();

    $query = $entityManager->createQuery(
        'SELECT pc
        FROM App\Entity\Pc pc 
        WHERE pc.seancecode_id == null
                                        
        '
    );

    // returns an array of Product objects
    return $query->execute();
}*/
}