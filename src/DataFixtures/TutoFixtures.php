<?php

namespace App\DataFixtures;

use App\ENtity\Tuto;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;

class TutoFixtures extends Fixture
{

    public function __construct(private SluggerInterface $slugger)
    {
    }

    public function load(ObjectManager $manager): void
    {
        $this->createTuto(
            '1',
            '2',
            'Le purrin d\'ortie',
            $manager
        );
        $this->createTuto(
            '2',
            '5',
            'Faire une butte en lassagne',
            $manager
        );
        $this->createTuto(
            '4',
            '7',
            'Comment marcoter une courge',
            $manager
        );

        $manager->flush();
    }

    public function createTuto(
        int $numTuto,
        int $friseChrono,
        string $titre,
        ObjectManager $manager
    ) {
        $tuto = new Tuto();
        $tuto->setNumTuto($numTuto);
        $tuto->setFriseChrono($friseChrono);
        $tuto->setTitre($titre);
        $tuto->setSlug($this->slugger->slug($tuto->getTitre())->lower());

        $manager->persist($tuto);

        return $tuto;
    }
}
