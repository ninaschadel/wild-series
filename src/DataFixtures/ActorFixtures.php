<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Actor;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ActorFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for($i = 0; $i <= 10; $i++) {
            $actor = new Actor();
            $actor->setName($faker->word());
            $actor->addProgram($this->getReference('program_' . $i % 6));
            $manager->persist($actor);
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
