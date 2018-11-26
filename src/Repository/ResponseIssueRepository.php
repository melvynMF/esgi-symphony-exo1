<?php

namespace App\Repository;

use App\Entity\ResponseIssue;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ResponseIssue|null find($id, $lockMode = null, $lockVersion = null)
 * @method ResponseIssue|null findOneBy(array $criteria, array $orderBy = null)
 * @method ResponseIssue[]    findAll()
 * @method ResponseIssue[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ResponseIssueRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ResponseIssue::class);
    }

    // /**
    //  * @return ResponseIssue[] Returns an array of ResponseIssue objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ResponseIssue
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
