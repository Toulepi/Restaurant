<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $userPasswordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->userPasswordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();
        for ($i = 0; $i < 9; $i++) {
            $user = new User();
            $user->setPrenom($faker->unique(true)->firstName);
            $user->setEmail($faker->unique(true)->email);
            $user->setPassword($this->userPasswordEncoder->encodePassword($user,'mdp123'));
            $manager->persist($user);
        }

        $manager->flush();
    }
}