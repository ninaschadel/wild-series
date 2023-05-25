<?php

namespace App\DataFixtures;

use App\Entity\Episode;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class EpisodeFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $episode = new Episode();
        $episode->setTitle('Days Gone Bye');
        $episode->setNumber(1);
        $episode->setSeason($this->getReference('season1_WalkingDead'));
        $episode->setSynopsis('Rick se réveille et découvre que la ville est envahit de zombies.');
        $manager->persist($episode);

        $episode = new Episode();
        $episode->setTitle('Guts');
        $episode->setNumber(2);
        $episode->setSeason($this->getReference('season1_WalkingDead'));
        $episode->setSynopsis('Rick se fait aider par un jeune survivant et il fait maintenant parti du groupe.');
        $manager->persist($episode);

        $episode = new Episode();
        $episode->setTitle('Tell it to the frogs');
        $episode->setNumber(3);
        $episode->setSeason($this->getReference('season1_WalkingDead'));
        $episode->setSynopsis('Merle est mort.');
        $manager->persist($episode);

        $episode = new Episode();
        $episode->setTitle('Ce qui nous attend');
        $episode->setNumber(1);
        $episode->setSeason($this->getReference('season2_WalkingDead'));
        $episode->setSynopsis("Le groupe quitte Atlante et se fait poursuivre par des morts-vivants. la petite Sophia s'enfuit dans les bois.");
        $manager->persist($episode);

        $episode = new Episode();
        $episode->setTitle('Saignée');
        $episode->setNumber(2);
        $episode->setSeason($this->getReference('season2_WalkingDead'));
        $episode->setSynopsis("Le groupe trouve un médecin dans une ferme, ils essaient de sauver Carl qui a reçu une balle.");
        $manager->persist($episode);

        $episode = new Episode();
        $episode->setTitle('Le tout pour le tout');
        $episode->setNumber(3);
        $episode->setSeason($this->getReference('season2_WalkingDead'));
        $episode->setSynopsis("A la ferme, l'état de Carl est de plus en plus critique. Il a besoin de soins d’urgence. En même temps, ils recherchent Sophia dans les bois.");
        $manager->persist($episode);
        
        $manager->flush();
    }
    public function getDependencies()
    {
        return [
            SeasonFixtures::class,
        ];
    }

}
