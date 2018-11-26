<?php
/**
 * Created by PhpStorm.
 * User: elgrim
 * Date: 26/11/18
 * Time: 19:58
 */

namespace App\Repository;


use App\Entity\IssueComments;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method IssueComments|null find($id, $lockMode = null, $lockVersion = null)
 * @method IssueComments|null findOneBy(array $criteria, array $orderBy = null)
 * @method IssueComments[]    findAll()
 * @method IssueComments[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FaqCommentRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, IssueComments::class);
    }
}