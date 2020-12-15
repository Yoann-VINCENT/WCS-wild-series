<?php

namespace App\DataFixtures;

use App\Entity\Program;
use App\Service\Slugify;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProgramFixtures extends Fixture implements DependentFixtureInterface
{
    const PROGRAMS = [
        'Walking Dead' => [
            'summary' => 'Le policier Rick Grimes se réveille après un long coma. Il découvre avec effarement que le monde, ravagé par une épidémie, est envahi par les morts-vivants.',
            'category' => 'category_0',
            'poster' => "https://m.media-amazon.com/images/M/MV5BZmFlMTA0MmUtNWVmOC00ZmE1LWFmMDYtZTJhYjJhNGVjYTU5XkEyXkFqcGdeQXVyMTAzMDM4MjM0._V1_.jpg"
        ],
        'The Haunting Of Hill House' => [
            'summary' => 'Plusieurs frères et sœurs qui, enfants, ont grandi dans la demeure qui allait devenir la maison hantée la plus célèbre des États-Unis, sont contraints de se réunir pour finalement affronter les fantômes de leur passé.',
            'category' => 'category_0',
            "poster" => "https://m.media-amazon.com/images/M/MV5BMTU4NzA4MDEwNF5BMl5BanBnXkFtZTgwMTQxODYzNjM@._V1_SY1000_CR0,0,674,1000_AL_.jpg",
        ],
        'American Horror Story' => [
            'summary' => 'A chaque saison, son histoire. American Horror Story nous embarque dans des récits à la fois poignants et cauchemardesques, mêlant la peur, le gore et le politiquement correct.',
            'category' => 'category_0',
            'poster' => "https://m.media-amazon.com/images/M/MV5BODZlYzc2ODYtYmQyZS00ZTM4LTk4ZDQtMTMyZDdhMDgzZTU0XkEyXkFqcGdeQXVyMzQ2MDI5NjU@._V1_SY1000_CR0,0,666,1000_AL_.jpg",
        ],
        'Love Death And Robots' => [
            'summary' => 'Un yaourt susceptible, des soldats lycanthropes, des robots déchaînés, des monstres-poubelles, des chasseurs de primes cyborgs, des araignées extraterrestres et des démons assoiffés de sang : tout ce beau monde est réuni dans 18 courts métrages animés déconseillés aux âmes sensibles.',
            'category' => 'category_0',
            'poster' => "https://m.media-amazon.com/images/M/MV5BMTc1MjIyNDI3Nl5BMl5BanBnXkFtZTgwMjQ1OTI0NzM@._V1_SY1000_CR0,0,674,1000_AL_.jpg"
        ],
        'Penny Dreadful' => [
            'summary' => 'Dans le Londres ancien, Vanessa Ives, une jeune femme puissante aux pouvoirs hypnotiques, allie ses forces à celles de Ethan, un garçon rebelle et violent aux allures de cowboy, et de Sir Malcolm, un vieil homme riche aux ressources inépuisables. Ensemble, ils combattent un ennemi inconnu, presque invisible, qui ne semble pas humain et qui massacre la population.',
            'category' => 'category_0',
            'poster' => "https://m.media-amazon.com/images/M/MV5BNmE5MDE0ZmMtY2I5Mi00Y2RjLWJlYjMtODkxODQ5OWY1ODdkXkEyXkFqcGdeQXVyNjU2NjA5NjM@._V1_SY1000_CR0,0,695,1000_AL_.jpg",
        ],
        'Fear The Walking Dead' => [
            'summary' => 'La série se déroule au tout début de l épidémie relatée dans la série mère The Walking Dead et se passe dans la ville de Los Angeles, et non à Atlanta. Madison est conseillère dans un lycée de Los Angeles. Depuis la mort de son mari, elle élève seule ses deux enfants : Alicia, excellente élève qui découvre les premiers émois amoureux, et son grand frère Nick qui a quitté la fac et a sombré dans la drogue.',
            'category' => 'category_0',
            'poster' => "https://m.media-amazon.com/images/M/MV5BYWNmY2Y1NTgtYTExMS00NGUxLWIxYWQtMjU4MjNkZjZlZjQ3XkEyXkFqcGdeQXVyMzQ2MDI5NjU@._V1_SY1000_CR0,0,666,1000_AL_.jpg",
        ],
        'Little Witch Academia' => [
            'summary' => 'Little Witch Academia (リトルウィッチアカデミア, Ritoru Witchi Akademia?) est un court-métrage d\'animation produit par le studio Trigger en 2013 pour l\'Anime Mirai 2013. Le film a été créé et réalisé par Yoh Yoshinari et écrit par Masahiko Otsuka. Il a été diffusé dans des salles de cinéma le 2 mars 20131 puis a été proposé en version sous-titrée en anglais sur YouTube à partir du 19 avril 2013. Un second court-métrage partiellement financé sur le site Kickstarter, intitulé Little Witch Academia: The Enchanted Parade (リトルウィッチアカデミア 魔法仕掛けのパレード, Ritoru Witchi Akademia: Mahō Shikake no Parēdo?) est sorti le 9 octobre 2015.',
            'category' => 'category_2',
            'poster' => "https://cdn.shopify.com/s/files/1/1878/3879/products/N4813.jpg?v=1557243216",
        ],
        'Fairy Tails' => [
            'summary' => 'L’histoire se focalise principalement sur les missions effectuées par l’une des équipes de la guilde Fairy Tail, composée de Natsu Dragnir (chasseur de dragon de feu), Lucy Heartfilia (constellationniste) et Happy (un Exceed, chat bleu pouvant se faire pousser des ailes, voler et parler), qui seront très vite rejoints par Erza Scarlett (mage chevalier) et Grey Fullbuster (Mage de glaces puis plus tard Chasseur de démons de Glace), deux autres membres de la fameuse guilde. Ils sont rejoints au cours de l\'aventure par Carla (une chatte blanche Exceed, comme Happy), Wendy (chasseuse de dragon céleste), et par bien d\'autres.',
            'category' => 'category_2',
            'poster' => "https://image.animedigitalnetwork.fr/license/fairytail/tv/web/affiche_600x856.jpg",
        ],
        'Skokugeki no soma' => [
            'summary' => 'Sôma Yukihira rêve de devenir chef cuisinier dans le restaurant familial et ainsi surpasser les talents culinaires de son père. Alors que Sôma vient juste d\'être diplômé au collège, son père Jôichirô Yukihira ferme le restaurant pour partir cuisiner à travers le monde. L\'esprit de compétition de Sôma va alors être mis à l\'épreuve par son père qui lui conseille de rejoindre une école d\'élite culinaire, où seuls 10 % des élèves sont diplômés. Sôma va-t-il parvenir à atteindre son objectif ? Pas de plus belle la vie ici !',
            'category' => 'category_2',
            'poster' => "https://images-na.ssl-images-amazon.com/images/I/71wo6lXoEwL._AC_SX679_.jpg",
        ],
        'The Legend of Korra' => [
            'summary' => 'Korra est un maître de l\'eau venant du Pôle Sud, elle est également la fille du chef de la tribu du Pole du Sud, qui a un fort caractère. En tant qu\'Avatar, elle doit apprendre à maîtriser les quatre éléments. Les maîtrises de l\'eau, de la terre et du feu et l\'air lui ont été enseignées pendant toute son enfance au pôle sud par les maîtres du Lotus Blanc, cependant elle n\'arrive pas à contrôler à la perfection sa maitrise de l\'air. Au début de la série, elle part vivre à la Cité de la République pour apprendre la maîtrise de l\'air auprès de Tenzin, le dernier maître de l\'air. La Cité de la République a été créée par Aang et Zuko après cent ans de guerre et abrite des gens de toutes les nations.',
            'category' => 'category_2',
            'poster' => 'https://i.pinimg.com/originals/bf/d9/ca/bfd9caa18bbbe8d69856e39371d74869.png'
        ]
    ];

    /**
     * @var Slugify
     */
    private $slugify;

    /**
     * ProgramFixtures constructor.
     * @param Slugify $slugify
     */
    public function __construct(Slugify $slugify)
    {
        $this->slugify = $slugify;
    }

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $i = 0;
        foreach (self::PROGRAMS as $title => $data) {
            $program = new Program();
            $program->setTitle($title)
                ->setSummary($data['summary'])
                ->setPoster($data['poster'])
                ->setCategory($this->getReference($data['category']))
                ->setSlug($this->slugify->generate($title));
            $manager->persist($program);
            $this->addReference('program_'.$i, $program);
            $i++;
        }
        $manager->flush();
    }
    public function getDependencies()
    {
        return [CategoryFixtures::class];
    }

}