<?php

namespace App\Repository;

use App\Entity\Pc;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\ORM\Query\ResultSetMapping;
/**
 * @method Pc|null find($id, $lockMode = null, $lockVersion = null)
 * @method Pc|null findOneBy(array $criteria, array $orderBy = null)
 * @method Pc[]    findAll()
 * @method Pc[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PcRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Pc::class);
    }

    // /**
    //  * @return Pc[] Returns an array of Pc objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
   
    /*
    public function findOneBySomeField($value): ?Pc
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    /**
      * @return Pc[] Returns an array of Pc objects
      */

    public function findAll():array
    {
        $sql = "
        SELECT
            pc.*
        FROM
            pc
       ;
        ";
        $rsm = new ResultSetMapping();
       // $rsm = new ResultSetMappingBuilder($this->getEntityManager());
        $rsm->addEntityResult(Pc::class, "pc");

        // On mappe le nom de chaque colonne en base de données sur les attributs de l'Entity
        foreach ($this->getClassMetadata()->fieldMappings as $obj) {
            $rsm->addFieldResult("pc", $obj["columnName"], $obj["fieldName"]);
        }
        
        $stmt = $this->getEntityManager()->createNativeQuery($sql, $rsm);
        $stmt->execute();
        
        return $stmt->getResult();
    }
}
