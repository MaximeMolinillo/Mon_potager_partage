<?php

namespace App\Entity\Trait;

use Doctrine\ORM\Mapping as ORM;

trait TypeTrait
{
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $type = null;
    
    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): static
    {
        $this->type = $type;

        return $this;
    }
}
