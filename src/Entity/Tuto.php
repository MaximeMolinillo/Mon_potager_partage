<?php

namespace App\Entity;

use App\Entity\Trait\SlugTrait;
use App\Entity\Trait\TitreTrait;
use App\Repository\TutoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TutoRepository::class)]
class Tuto
{
    use TitreTrait;
    use SlugTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $num_tuto = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $frise_chrono = null;

    #[ORM\OneToMany(mappedBy: 'tuto', targetEntity: ArticleTuto::class)]
    private Collection $articleTutos;

    public function __construct()
    {
        $this->articleTutos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumTuto(): ?int
    {
        return $this->num_tuto;
    }

    public function setNumTuto(int $num_tuto): static
    {
        $this->num_tuto = $num_tuto;

        return $this;
    }

    public function getFriseChrono(): ?\DateTimeInterface
    {
        return $this->frise_chrono;
    }

    public function setFriseChrono(?\DateTimeInterface $frise_chrono): static
    {
        $this->frise_chrono = $frise_chrono;

        return $this;
    }

    /**
     * @return Collection<int, ArticleTuto>
     */
    public function getArticleTutos(): Collection
    {
        return $this->articleTutos;
    }

    public function addArticleTuto(ArticleTuto $articleTuto): static
    {
        if (!$this->articleTutos->contains($articleTuto)) {
            $this->articleTutos->add($articleTuto);
            $articleTuto->setTuto($this);
        }

        return $this;
    }

    public function removeArticleTuto(ArticleTuto $articleTuto): static
    {
        if ($this->articleTutos->removeElement($articleTuto)) {
            // set the owning side to null (unless already changed)
            if ($articleTuto->getTuto() === $this) {
                $articleTuto->setTuto(null);
            }
        }

        return $this;
    }
}
