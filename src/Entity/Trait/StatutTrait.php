<?php

namespace App\Entity\Trait;

use Doctrine\ORM\Mapping as ORM;

trait StatutTrait
{
    #[ORM\Column]
    private ?bool $statut = null;

    public function isStatut(): ?bool
    {
        return $this->statut;
    }

    public function setStatut(bool $statut): static
    {
        $this->statut = $statut;

        return $this;
    }
}
