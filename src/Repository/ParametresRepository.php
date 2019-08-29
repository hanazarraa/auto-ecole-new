<?php

namespace App\Repository;

use App\Entity\Parametres;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\ORM\Query\ResultSetMapping;

/**
 * @method Parametres|null find($id, $lockMode = null, $lockVersion = null)
 * @method Parametres|null findOneBy(array $criteria, array $orderBy = null)
 * @method Parametres[]    findAll()
 * @method Parametres[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ParametresRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Parametres::class);
    }

    // /**
    //  * @return Parametres[] Returns an array of Parametres objects
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
    public function findOneBySomeField($value): ?Parametres
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    
    public function getPcs(){
        $sql = "
        SELECT
            parametres.nombre_pcs
        FROM
            parametres
       ;
        ";
        $rsm = new ResultSetMapping();
        // $rsm = new ResultSetMappingBuilder($this->getEntityManager());
         $rsm->addEntityResult(Parametres::class, "parametres");
 
         // On mappe le nom de chaque colonne en base de données sur les attributs de l'Entity
         foreach ($this->getClassMetadata()->fieldMappings as $obj) {
             $rsm->addFieldResult("parametres", $obj["columnName"], $obj["fieldName"]);
         }
         
         $stmt = $this->getEntityManager()->createNativeQuery($sql, $rsm);
         $stmt->execute();
         
         return $stmt->getScalarResult();
    }
}
