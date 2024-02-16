<?php

namespace App\DataFixtures;

use App\Entity\Encyclopedie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;

class EncyclopedieFixtures extends Fixture
{
    public function __construct(private SluggerInterface $slugger)
    {
    }
    public function load(ObjectManager $manager): void
    {
        $this->createEncyclopedie(
            '1',
            'Les tomates',
            'type',
            '3',
            '5',
            '8',
            'Tempéré',
            'pic',
            '+++',
            '1.5',
            '30',
            '6kg',
            'la tomate est un fruit',
            'quievrechain',
            '',
            $manager
        );
        $this->createEncyclopedie(
            '2',
            'Les poivrons',
            'type',
            '4',
            '5',
            '7',
            'Méditéranéen',
            'pic',
            '+',
            '50cm',
            '40',
            '1kg',
            'le poivron est un piment',
            'Martigues',
            '',
            $manager
        );
        $this->createEncyclopedie(
            '3',
            'Les melons',
            'type',
            '5',
            '7',
            '9',
            'Ensolleilé',
            'pic',
            '++++',
            '30 cm',
            '40',
            '8kg',
            'le melon est une courge',
            'Cavaillon',
            '',
            $manager
        );

        $manager->flush();
    }

    public function createEncyclopedie(
        int $id_encyclopedie,
        string $titre,
        string $type,
        int $semis,
        int $repiquage,
        int $recolte,
        string $climat,
        string $photo,
        string $nourriture,
        string $taille,
        string $espacement,
        string $rendement,
        string $description,
        string $secteurGeo,
        bool $statut,
        ObjectManager $manager
    ) {
        $encyclopedie = new Encyclopedie();
        $encyclopedie->setIdEncyclopedie($id_encyclopedie);
        $encyclopedie->setTitre($titre);
        $encyclopedie->setType($type);
        $encyclopedie->setMoisSemis($semis);
        $encyclopedie->setMoisRepiquage($repiquage);
        $encyclopedie->setMoisRecolte($recolte);
        $encyclopedie->setClimat($climat);
        $encyclopedie->setPhoto($photo);
        $encyclopedie->setNourriture($nourriture);
        $encyclopedie->setTaille($taille);
        $encyclopedie->setEspacement($espacement);
        $encyclopedie->setRendement($rendement);
        $encyclopedie->setDescription($description);
        $encyclopedie->setSecteurGeo($secteurGeo);
        $encyclopedie->setstatut($statut);
        $encyclopedie->setSlug($this->slugger->slug($encyclopedie->getTitre())->lower());

        $manager->persist($encyclopedie);
    }
}
