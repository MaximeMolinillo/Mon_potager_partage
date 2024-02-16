<?php

namespace App\DataFixtures;

use App\Entity\AvisEncyclopedie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AvisEncyclopedieFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $this->createEncyclopedieAvis('2', '2', $manager);
        $this->createEncyclopedieAvis('3', '5', $manager);
        $this->createEncyclopedieAvis('4', '4', $manager);
        $this->createEncyclopedieAvis('5', '2', $manager);

        $manager->flush();
    }

    public function createEncyclopedieAvis(int $id_note_encyclopedie, int $avis_encyclopedie, ObjectManager $manager)
    {
        $encyclopedieAvis = new AvisEncyclopedie();
        $encyclopedieAvis->setIdNoteEncyclopedie($id_note_encyclopedie);
        $encyclopedieAvis->setAvisEncyclopedie($avis_encyclopedie);

        $manager->persist($encyclopedieAvis);

        return $encyclopedieAvis;

    }
}
