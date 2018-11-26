<?php

namespace App\Repository;

use App\Entity\IssueResponses;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method IssueResponses|null find($id, $lockMode = null, $lockVersion = null)
 * @method IssueResponses|null findOneBy(array $criteria, array $orderBy = null)
 * @method IssueResponses[]    findAll()
 * @method IssueResponses[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ResponseIssueRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, IssueResponses::class);
    }

    // /**
    //  * @return IssueResponses[] Returns an array of IssueResponses objects
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
    public function findOneBySomeField($value): ?IssueResponses
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
