<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Faker;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

     public function __construct(UserPasswordEncoderInterface $passwordEncoder)
   {
        $this->passwordEncoder = $passwordEncoder;
   }

    public function load(ObjectManager $manager)
    {
//        $faker  =  Faker\Factory::create('en_US');
//        for ($i = 0; $i < 30; $i++) {
//            $user = new User();
//            $user->setEmail($faker->email)
//                ->setPassword($this->passwordEncoder->encodePassword(
//                $user,
//                $faker->password
//            ));
//            $manager->persist($user);
//        }

        $contributor = new User();
        $contributor->setEmail('contributor@monsite.com');
        $contributor->setRoles(['ROLE_CONTRIBUTOR']);
        $contributor->setPassword($this->passwordEncoder->encodePassword(
            $contributor,
            'contributorpassword'
        ));
        $manager->persist($contributor);

        $admin = new User();
        $admin->setEmail('admin@monsite.com');
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setPassword($this->passwordEncoder->encodePassword(
            $admin,
            'adminpassword'
        ));
        $manager->persist($admin);
        $this->addReference('admin', $admin);
        $manager->flush();
    }
}
