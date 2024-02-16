<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;

class ArticleFixtures extends Fixture
{
    public function __construct(private SluggerInterface $slugger)
    {
    }
 
    public function load(ObjectManager $manager): void
    {
         $this->createArticle('1','Tomates' ,'tomatesSollemniter vel multatio turbidum celate fidem a digesta antea internarum oportunum internarum tempus bella lituis noxiorum velut ut ut lituis versabatur Parthica lituis capitum et dicerentur carnifex conpositorum bonorum noxiorum oportunum recensere puto sollemniter ingenium discernente causarum Parthica et ad a nunc noxiorum societate orientales et silente omne Parthica a.','7' ,'', $manager );

         $this->createArticle('2','Poivrons' ,'Poivrons Sollemniter vel multatio turbidum celate fidem a digesta antea internarum oportunum internarum tempus bella lituis noxiorum velut ut ut lituis versabatur Parthica lituis capitum et dicerentur carnifex conpositorum bonorum noxiorum oportunum recensere puto sollemniter ingenium discernente causarum Parthica et ad a nunc noxiorum societate orientales et silente omne Parthica a.','6' ,'', $manager );

         $this->createArticle('3','Melons' ,'tomatesSollemniter vel multatio turbidum celate fidem a digesta antea internarum oportunum internarum tempus bella lituis noxiorum velut ut ut lituis versabatur Parthica lituis capitum et dicerentur carnifex conpositorum bonorum noxiorum oportunum recensere puto sollemniter ingenium discernente causarum Parthica et ad a nunc noxiorum societate orientales et silente omne Parthica a.','5' ,'', $manager );

         $this->createArticle('4','Courgette' ,'tomatesSollemniter vel multatio turbidum celate fidem a digesta antea internarum oportunum internarum tempus bella lituis noxiorum velut ut ut lituis versabatur Parthica lituis capitum et dicerentur carnifex conpositorum bonorum noxiorum oportunum recensere puto sollemniter ingenium discernente causarum Parthica et ad a nunc noxiorum societate orientales et silente omne Parthica a.','4' ,'', $manager );

        $manager->flush();

    
    }

    public function createArticle(int $numArticle, string $titre, string $texte, int $friseChrono, bool $statut, ObjectManager $manager)
    {
        $article = new Article();
        $article->setNumArticle($numArticle);
        $article->setTitre($titre);
        $article->setSlug($this->slugger->slug($article->getTitre())->lower());
        $article->setTexte($texte);
        $article->setFriseChronologique($friseChrono);
        $article->setStatut($statut);

        $manager->persist($article);

        return $article;
    }
}
