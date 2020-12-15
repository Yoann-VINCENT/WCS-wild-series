<?php

namespace App\DataFixtures;

use App\Entity\Actor;
use App\Service\Slugify;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker;

class ActorFixtures extends Fixture implements DependentFixtureInterface
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
        for ($i = 0; $i < 100; $i++) {
            $randNB = rand(0,9);
            $actor = new Actor();
            $actor->setName($faker->name)
                ->addProgram($this->getReference('program_' . $randNB, $actor))
                ->setSlug($this->slugify->generate($actor->getName()));
            $manager->persist($actor);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [ProgramFixtures::class];
    }
}