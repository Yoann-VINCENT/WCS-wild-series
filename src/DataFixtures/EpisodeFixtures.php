<?php

namespace App\DataFixtures;

use App\Entity\Episode;
use App\Service\Slugify;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker;

class EpisodeFixtures extends Fixture implements DependentFixtureInterface
{
    /**
     * @var Slugify
     */
    private $slugify;

    /**
     * EpisodeFixtures constructor.
     * @param Slugify $slugify
     */
    public function __construct(Slugify $slugify)
    {
        $this->slugify = $slugify;
    }

    public function load(ObjectManager $manager)
    {
        $faker  =  Faker\Factory::create('en_US');
        for ($i = 0; $i < 9; $i++) {
            for ($j = 1; $j < 11; $j++) {
                for ($k = 1; $k < 21; $k++) {
                    $episode = new Episode();
                    $episode->setNumber($k)
                        ->setTitle($faker->city)
                        ->setSynopsis($faker->realText())
                        ->setSeason($this->getReference('program_' . $i . 'season_' . $j))
                        ->setSlug($this->slugify->generate($episode->getTitle()));
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