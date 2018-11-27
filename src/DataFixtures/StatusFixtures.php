<?php
/**
 * Created by PhpStorm.
 * User: elgrim
 * Date: 27/11/18
 * Time: 10:42
 */

namespace App\DataFixtures;


use App\Entity\Status;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class StatusFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $status = new Status();
        $status->setColor("#c0c0c0")
            ->setTitle("on validation");

        $manager->persist($status);

        $status = new Status();
        $status->setColor("#00ff00")
            ->setTitle("done");
        $manager->persist($status);


        $status = new Status();
        $status->setColor("#ff4500")
            ->setTitle("in progress");
        $manager->persist($status);

        $manager->flush();
    }
}