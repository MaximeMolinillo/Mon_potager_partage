<?php

namespace App\DataFixtures;

use App\Entity\Calendrier;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class CalendrierFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // // PROBLEME DE DATE
        // $this->createCalendar('1', 
        // // '2024-01-01 21:06:06', '2024-02-01',
        //  'type', 'planter tomates', $manager);
        // $this->createCalendar('2', 'type', 'planter poivrons', $manager);
        // $this->createCalendar('3', 'type', 'planter melons', $manager);

        // $manager->flush();
    }

    // public function createCalendar(
    //     int $id_encart,
    //     //  DateTime $debut, DateTime $fin, 
    //     string $type, string $description, ObjectManager $manager
    // ) {
    //     $calendrier = new Calendrier();
    //     //  $calendrier->setAuteur($auteur_id);
    //     $calendrier->setIdEncartCalendaire($id_encart);
    //     // $calendrier->setDebut($debut);
    //     // $calendrier->setFin($fin);
    //     $calendrier->setType($type);
    //     $calendrier->setDescription($description);

    //     $manager->persist($calendrier);

    //     return $calendrier;
  //  }
}
