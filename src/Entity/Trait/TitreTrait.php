<?php

namespace App\Entity\Trait;

use Doctrine\ORM\Mapping as ORM;

trait TitreTrait
{
    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }
}