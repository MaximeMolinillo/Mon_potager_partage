<?php

namespace App\DataFixtures;

use App\Entity\ArticleTuto;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ArticleTutoFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
      $this->createArticleTuto('1', 'Couper 1 Kg d\'orties, les mettres dans un filet ou linge', 'NULL', '1', $manager);
      $this->createArticleTuto('1', 'Laisser tremper dans 10Litres d\'eau pendant 15 jours', 'NULL', '2', $manager);
      $this->createArticleTuto('1', 'Mélanger tout  les jours', 'NULL', '3', $manager);
      $this->createArticleTuto('1', 'Diluer à hauteur de 1/10', 'NULL', '4', $manager);

        $manager->flush();
    }

    public function createArticleTuto( int $id_article_tuto, string $instruction, string $photo, int $ordre_chrono, ObjectManager $manager)
    {
        $articleTuto = new ArticleTuto();
        $articleTuto->setIdArticleTuto($id_article_tuto);
        $articleTuto->setInstruction($instruction);
        $articleTuto->setPhoto($photo);
        $articleTuto->setOrdreChrono($ordre_chrono);

        $manager->persist($articleTuto);

        return $articleTuto;     

    }
}
