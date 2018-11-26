<?php
/**
 * Created by PhpStorm.
 * User: elgrim
 * Date: 26/11/18
 * Time: 19:59
 */

namespace App\Repository;


use App\Entity\IssueComments;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class FaqRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, IssueComments::class);
    }
}