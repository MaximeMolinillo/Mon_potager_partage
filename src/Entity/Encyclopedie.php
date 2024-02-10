<?php

namespace App\Entity;

use App\Entity\Trait\PhotoTrait;
use App\Entity\Trait\StatutTrait;
use App\Entity\Trait\TitreTrait;
use App\Entity\Trait\TypeTrait;
use App\Repository\EncyclopedieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EncyclopedieRepository::class)]
class Encyclopedie
{
    use TitreTrait;
    use PhotoTrait;
    use StatutTrait;
    use TypeTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $id_encyclopedie = null;

    #[ORM\Column(nullable: true)]
    private ?int $mois_semis = null;

    #[ORM\Column(nullable: true)]
    private ?int $mois_repiquage = null;

    #[ORM\Column(nullable: true)]
    private ?int $mois_recolte = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $climat = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nourriture = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $taille = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $espacement = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $rendement = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $secteur_geo = null;

    #[ORM\ManyToOne(inversedBy: 'encyclopedies')]
    private ?Utilisateur $auteur = null;

    #[ORM\OneToMany(mappedBy: 'fiche_encyclopedie', targetEntity: AvisEncyclopedie::class)]
    private Collection $avisEncyclopedies;

    public function __construct()
    {
        $this->avisEncyclopedies = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdEncyclopedie(): ?int
    {
        return $this->id_encyclopedie;
    }

    public function setIdEncyclopedie(int $id_encyclopedie): static
    {
        $this->id_encyclopedie = $id_encyclopedie;

        return $this;
    }



    public function getMoisSemis(): ?int
    {
        return $this->mois_semis;
    }

    public function setMoisSemis(?int $mois_semis): static
    {
        $this->mois_semis = $mois_semis;

        return $this;
    }

    public function getMoisRepiquage(): ?int
    {
        return $this->mois_repiquage;
    }

    public function setMoisRepiquage(?int $mois_repiquage): static
    {
        $this->mois_repiquage = $mois_repiquage;

        return $this;
    }

    public function getMoisRecolte(): ?int
    {
        return $this->mois_recolte;
    }

    public function setMoisRecolte(?int $mois_recolte): static
    {
        $this->mois_recolte = $mois_recolte;

        return $this;
    }

    public function getClimat(): ?string
    {
        return $this->climat;
    }

    public function setClimat(?string $climat): static
    {
        $this->climat = $climat;

        return $this;
    }

    public function getNourriture(): ?string
    {
        return $this->nourriture;
    }

    public function setNourriture(?string $nourriture): static
    {
        $this->nourriture = $nourriture;

        return $this;
    }

    public function getTaille(): ?string
    {
        return $this->taille;
    }

    public function setTaille(?string $taille): static
    {
        $this->taille = $taille;

        return $this;
    }

    public function getEspacement(): ?string
    {
        return $this->espacement;
    }

    public function setEspacement(?string $espacement): static
    {
        $this->espacement = $espacement;

        return $this;
    }

    public function getRendement(): ?string
    {
        return $this->rendement;
    }

    public function setRendement(?string $rendement): static
    {
        $this->rendement = $rendement;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getSecteurGeo(): ?string
    {
        return $this->secteur_geo;
    }

    public function setSecteurGeo(?string $secteur_geo): static
    {
        $this->secteur_geo = $secteur_geo;

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
     * @return Collection<int, AvisEncyclopedie>
     */
    public function getAvisEncyclopedies(): Collection
    {
        return $this->avisEncyclopedies;
    }

    public function addAvisEncyclopedy(AvisEncyclopedie $avisEncyclopedy): static
    {
        if (!$this->avisEncyclopedies->contains($avisEncyclopedy)) {
            $this->avisEncyclopedies->add($avisEncyclopedy);
            $avisEncyclopedy->setFicheEncyclopedie($this);
        }

        return $this;
    }

    public function removeAvisEncyclopedy(AvisEncyclopedie $avisEncyclopedy): static
    {
        if ($this->avisEncyclopedies->removeElement($avisEncyclopedy)) {
            // set the owning side to null (unless already changed)
            if ($avisEncyclopedy->getFicheEncyclopedie() === $this) {
                $avisEncyclopedy->setFicheEncyclopedie(null);
            }
        }

        return $this;
    }
}
