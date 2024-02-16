<?php

namespace App\Entity;

use App\Entity\Trait\PhotoTrait;
use App\Entity\Trait\SlugTrait;
use App\Entity\Trait\StatutTrait;
use App\Entity\Trait\TitreTrait;
use App\Repository\ArticleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArticleRepository::class)]
class Article
{
    use TitreTrait;
    use PhotoTrait;
    use StatutTrait;
    use SlugTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $num_article = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $texte = null;

    #[ORM\Column(nullable: true)]
    private ?int $frise_chronologique = null;

    #[ORM\ManyToOne(inversedBy: 'articles')]
    #[ORM\JoinColumn(onDelete: 'CASCADE')]
    private ?Utilisateur $auteur = null;

    #[ORM\OneToMany(mappedBy: 'article', targetEntity: AvisArticle::class)]
    private Collection $avisArticles;

    public function __construct()
    {
        $this->avisArticles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumArticle(): ?int
    {
        return $this->num_article;
    }

    public function setNumArticle(int $num_article): static
    {
        $this->num_article = $num_article;

        return $this;
    }

    public function getTexte(): ?string
    {
        return $this->texte;
    }

    public function setTexte(?string $texte): static
    {
        $this->texte = $texte;

        return $this;
    }

    public function getFriseChronologique(): ?int
    {
        return $this->frise_chronologique;
    }

    public function setFriseChronologique(?int $frise_chronologique): static
    {
        $this->frise_chronologique = $frise_chronologique;

        return $this;
    }

    public function getAuteur(): ?Utilisateur
    {
        return $this->auteur;
    }

    public function setAuteur(?Utilisateur $auteur): static
    {
        $this->auteur = $auteur;

        return $this;
    }

    /**
     * @return Collection<int, AvisArticle>
     */
    public function getAvisArticles(): Collection
    {
        return $this->avisArticles;
    }

    public function addAvisArticle(AvisArticle $avisArticle): static
    {
        if (!$this->avisArticles->contains($avisArticle)) {
            $this->avisArticles->add($avisArticle);
            $avisArticle->setArticle($this);
        }

        return $this;
    }

    public function removeAvisArticle(AvisArticle $avisArticle): static
    {
        if ($this->avisArticles->removeElement($avisArticle)) {
            // set the owning side to null (unless already changed)
            if ($avisArticle->getArticle() === $this) {
                $avisArticle->setArticle(null);
            }
        }

        return $this;
    }
}
