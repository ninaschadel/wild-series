<?php

namespace App\DataFixtures;

use App\Entity\Program;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProgramFixtures extends Fixture implements DependentFixtureInterface
{
    CONST PROGRAMS = [
        [
            'title' => 'Walking Dead',
            'synopsis' => 'Des zombies envahissent la terre',
            'category' => 'category_Horreur'
        ],
        [
            'title' => 'Vikings',
            'synopsis' => "La série Vikings retrace l'épopée sanglante et passionnante du légendaire chef viking Ragnar Lothbrok, devenant un symbole de bravoure, de conquête et de luttes intestines au sein de l'âge d'or des Vikings.",
            'category' => 'category_Action'
        ],
        [
            'title' => 'Dragon Ball Z',
            'synopsis' => "Dragon Ball Z suit les aventures de Goku, un puissant guerrier extraterrestre, et de ses alliés alors qu'ils combattent des ennemis redoutables, repoussent les limites de leurs pouvoirs et protègent la Terre contre des menaces intergalactiques.",
            'category' => 'category_Animation'
        ],
        [
            'title' => 'Game of Thrones',
            'synopsis' => "Dans un monde fantastique et brutal, les familles nobles s'affrontent pour le trône de fer, tandis que des forces surnaturelles menaçantes se réveillent, entraînant des intrigues politiques, des trahisons et des batailles épiques dans la lutte pour le pouvoir suprême.",
            'category' => 'category_Fantastique'
        ],
        [
            'title' => 'Sweet Tooth',
            'synopsis' => "Dans un monde post-apocalyptique, un jeune garçon mi-humain mi-cerf se lance dans un voyage périlleux à travers des terres dévastées, rencontrant des alliés inattendus et affrontant des dangers impitoyables, dans l'espoir de découvrir l'origine de son existence et de trouver un refuge pour les hybrides comme lui.",
            'category' => 'category_Aventure'
        ],
    ];
    public function load(ObjectManager $manager)

    {
        foreach (self::PROGRAMS as $key => $programData) {
            $program = new Program();
            $program->setTitle($programData['title']);
            $program->setSynopsis($programData['synopsis']);
            $program->setCategory($this->getReference($programData['category']));
            $manager->persist($program);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
          CategoryFixtures::class,
        ];
    }
}

