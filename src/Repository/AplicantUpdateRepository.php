<?php

namespace App\Repository;

use App\Entity\AplicantUpdate;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method AplicantUpdate|null find($id, $lockMode = null, $lockVersion = null)
 * @method AplicantUpdate|null findOneBy(array $criteria, array $orderBy = null)
 * @method AplicantUpdate[]    findAll()
 * @method AplicantUpdate[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AplicantUpdateRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, AplicantUpdate::class);
    }

    // /**
    //  * @return AplicantUpdate[] Returns an array of AplicantUpdate objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AplicantUpdate
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
