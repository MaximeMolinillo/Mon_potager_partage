<?php

namespace App\Entity\Trait;

use Doctrine\ORM\Mapping as ORM;

trait PhotoTrait
{
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $photo = null;

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): static
    {
        $this->photo = $photo;

        return $this;
    }
}