<?php

namespace App\DataFixtures;

use App\Entity\Episode;
use App\Entity\Season;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker;

class EpisodeFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $faker  =  Faker\Factory::create('en_US');
        for ($i = 0; $i < 8; $i++) {
            for ($j = 1; $j < 11; $j++) {
                for ($k = 1; $k < 21; $k++) {
                    $episode = new Episode();
                    $episode->setNumber($k);
                    $episode->setTitle($faker->city);
                    $episode->setSynopsis($faker->realText());
                    $episode->setSeason($this->getReference('program_' . $i . 'season_' . $j));
                    $manager->persist($episode);
                }
            }
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [SeasonFixtures::class];
    }
}