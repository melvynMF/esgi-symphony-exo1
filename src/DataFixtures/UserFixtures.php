<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{

    private $passwordEncode;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncode = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {

        $user = new User();
        $user->setEmail("test@gmail.com")
            ->setRoles(["ROLE_DEV"])
            ->setPassword($this->passwordEncode->encodePassword(
                $user,
                'root'
            ));

        $manager->persist($user);
        $manager->flush();
    }
}
