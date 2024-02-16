<?php

namespace App\DataFixtures;

use App\Entity\AvisArticle;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AvisArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $this->createArticleAvis('2', '2', $manager);
        $this->createArticleAvis('3', '5', $manager);
        $this->createArticleAvis('4', '4', $manager);
        $this->createArticleAvis('5', '2', $manager);

        $manager->flush();
    }

    public function createArticleAvis(int $id_note_article, int $avis_article, ObjectManager $manager)
    {
        $articleAvis = new AvisArticle();
        $articleAvis->setIdNoteArticle($id_note_article);
        $articleAvis->setAvisArticle($avis_article);

        $manager->persist($articleAvis);

        return $articleAvis;

    }
}
