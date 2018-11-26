<?php

namespace App\Repository;

use App\Entity\CommentIssues;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CommentIssues|null find($id, $lockMode = null, $lockVersion = null)
 * @method CommentIssues|null findOneBy(array $criteria, array $orderBy = null)
 * @method CommentIssues[]    findAll()
 * @method CommentIssues[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CommentIssuesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CommentIssues::class);
    }

    // /**
    //  * @return CommentIssues[] Returns an array of CommentIssues objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CommentIssues
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
