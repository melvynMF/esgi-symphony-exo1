<?php

namespace App\Repository;

use App\Entity\FaqResponse;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method FaqResponse|null find($id, $lockMode = null, $lockVersion = null)
 * @method FaqResponse|null findOneBy(array $criteria, array $orderBy = null)
 * @method FaqResponse[]    findAll()
 * @method FaqResponse[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FaqResponseRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, FaqResponse::class);
    }

    // /**
    //  * @return FaqResponse[] Returns an array of FaqResponse objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FaqResponse
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
