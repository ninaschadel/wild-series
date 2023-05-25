<?php

namespace App\DataFixtures;

use App\Entity\Season;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class SeasonFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $season = new Season();
        $season->setNumber(1);
        $season->setProgram($this->getReference('program_WalkingDead'));
        $season->setYear(2010);
        $season->setDescription('Invasion de zombie');
        $this->addReference('season1_WalkingDead', $season);
        $manager->persist($season);

        $season = new Season();
        $season->setNumber(2);
        $season->setProgram($this->getReference('program_WalkingDead'));
        $season->setYear(2010);
        $season->setDescription('Cette saison est basée sur la dégradation inéluctable des rapports humains dans un monde apocalyptique.');
        $this->addReference('season2_WalkingDead', $season);
        $manager->persist($season);

        $manager->flush();
    }
    public function getDependencies()
    {
        return [
            ProgramFixtures::class,
        ];
    }

}
