<?php

namespace App\Entity;

use App\Entity\Trait\PhotoTrait;
use App\Repository\ArticleTutoRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArticleTutoRepository::class)]
class ArticleTuto
{
    use PhotoTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $id_article_tuto = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $instruction = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $photo = null;

    #[ORM\Column(nullable: true)]
    private ?int $ordre_chrono = null;

    #[ORM\ManyToOne(inversedBy: 'articleTutos')]
    private ?Tuto $tuto = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdArticleTuto(): ?int
    {
        return $this->id_article_tuto;
    }

    public function setIdArticleTuto(int $id_article_tuto): static
    {
        $this->id_article_tuto = $id_article_tuto;

        return $this;
    }

    public function getInstruction(): ?string
    {
        return $this->instruction;
    }

    public function setInstruction(?string $instruction): static
    {
        $this->instruction = $instruction;

        return $this;
    }

    public function getOrdreChrono(): ?int
    {
        return $this->ordre_chrono;
    }

    public function setOrdreChrono(?int $ordre_chrono): static
    {
        $this->ordre_chrono = $ordre_chrono;

        return $this;
    }

    public function getTuto(): ?Tuto
    {
        return $this->tuto;
    }

    public function setTuto(?Tuto $tuto): static
    {
        $this->tuto = $tuto;

        return $this;
    }
}
