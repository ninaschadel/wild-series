<?php

namespace App\DataFixtures;

use App\Entity\Season;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker\Factory;

class SeasonFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for($i = 0; $i <= 30; $i++) {
            $season = new Season();
            $season->setNumber($i + 1);
            $season->setYear($faker->year());
            $season->setDescription($faker->paragraphs(3, true));
            $this->addReference('season_' . $i, $season);
            $season->setProgram($this->getReference('program_' . ($i % 6)));
            $manager->persist($season);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
           ProgramFixtures::class,
        ];
    }
}
