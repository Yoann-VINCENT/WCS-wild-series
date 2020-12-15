<?php

namespace App\DataFixtures;

use App\Entity\Season;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker;

class SeasonFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $faker  =  Faker\Factory::create('en_US');
        for ($i = 0; $i < 10; $i++) {
            for ($j = 1; $j < 11; $j++) {
                $season = new Season();
                $season->setNumber($j);
                $season->setDescription($faker->realText());
                $season->setYear('200' . $j);
                $season->setProgram($this->getReference('program_' . $i));
                $manager->persist($season);
                $this->addReference('program_'. $i . 'season_' . $j, $season);
            }
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [ProgramFixtures::class];
    }
}