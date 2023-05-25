<?php

namespace App\DataFixtures;

use App\Entity\Program;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProgramFixtures extends Fixture implements DependentFixtureInterface
{
    /*public static int $numberOfProgram = 1;*/
    public function load(ObjectManager $manager)
    {
        $program = new Program();
        $program->setTitle('Walking Dead');
        $program->setCategory($this->getReference('category_Horreur'));
        $program->setSynopsis('Des zombies envahissent la terre');
        $program->setCountry('Etats-Unis');
        $program->setYear(2010);
        $this->addReference('program_0', $program);
        $manager->persist($program);

        $program = new Program();
        $program->setTitle('Vikings');
        $program->setCategory($this->getReference('category_Action'));
        $program->setSynopsis("Un chef viking Ragnar Lothbrok devient un symbole de bravoure, de conquête et de luttes intestines au sein de l'âge d'or des Vikings.");
        $program->setCountry('Irlande');
        $program->setYear(2013);
        $this->addReference('program_1', $program);
        $manager->persist($program);

        $program = new Program();
        $program->setTitle('Dragon Ball Z');
        $program->setCategory($this->getReference('category_Animation'));
        $program->setSynopsis("Dragon Ball Z suit les aventures de Goku, un puissant guerrier extraterrestre, et de ses alliés alors qu'ils combattent des ennemis redoutables, repoussent les limites de leurs pouvoirs et protègent la Terre contre des menaces intergalactiques.");
        $program->setCountry('Japon');
        $program->setYear(1989);
        $this->addReference('program_2', $program);
        $manager->persist($program);

        $program = new Program();
        $program->setTitle('Game of Thrones');
        $program->setCategory($this->getReference('category_Fantastique'));
        $program->setSynopsis("Dans un monde fantastique et brutal, les familles nobles s'affrontent pour le trône de fer, tandis que des forces surnaturelles menaçantes se réveillent, entraînant des intrigues politiques, des trahisons et des batailles épiques dans la lutte pour le pouvoir suprême.");
        $program->setCountry('Irlande');
        $program->setYear(1996);
        $this->addReference('program_3', $program);
        $manager->persist($program);

        $program = new Program();
        $program->setTitle('Sweet Tooth');
        $program->setCategory($this->getReference('category_Aventure'));
        $program->setSynopsis("Dans un monde post-apocalyptique, un jeune garçon mi-humain mi-cerf se lance dans un voyage périlleux à travers des terres dévastées, rencontrant des alliés inattendus et affrontant des dangers impitoyables, dans l'espoir de découvrir l'origine de son existence et de trouver un refuge pour les hybrides comme lui.");
        $program->setCountry('Nouvelle-Zélande');
        $program->setYear(2021);
        $this->addReference('program_4', $program);
        $manager->persist($program);

        $program = new Program();
        $program->setTitle('En un battement');
        $program->setCategory($this->getReference('category_Drame'));
        $program->setSynopsis("Ca parle du trafic d'organes.");
        $program->setCountry('Colombie');
        $program->setYear(2022);
        $this->addReference('program_5', $program);
        $manager->persist($program);

        $manager->flush();


/*FAUT-IL LE METTRE ? :
        foreach (self::PROGRAMS as $key => $programData) {
            $program = new Program();
            $program->setTitle($programData['title']);
            $program->setSynopsis($programData['synopsis']);
            $program->setCategory($this->getReference($programData['category']));
            $this->addReference('program_' . $key, $program);
            $manager->persist($program);
            self::$numberOfProgram++;
        }
        $manager->flush();*/
    }

    public function getDependencies()
    {
        return [
            CategoryFixtures::class,
        ];
    }
}
