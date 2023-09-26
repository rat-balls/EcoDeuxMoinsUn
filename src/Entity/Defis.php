<?php

namespace App\Entity;

use App\Repository\DefisRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DefisRepository::class)]
class Defis
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom = null;

    #[ORM\Column(length: 255)]
    private ?string $Description = null;

    #[ORM\Column(length: 255)]
    private ?string $Conditions_completion = null;

    #[ORM\Column]
    private ?int $Points = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Createur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): static
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): static
    {
        $this->Description = $Description;

        return $this;
    }

    public function getConditionsCompletion(): ?string
    {
        return $this->Conditions_completion;
    }

    public function setConditionsCompletion(string $Conditions_completion): static
    {
        $this->Conditions_completion = $Conditions_completion;

        return $this;
    }

    public function getPoints(): ?int
    {
        return $this->Points;
    }

    public function setPoints(int $Points): static
    {
        $this->Points = $Points;

        return $this;
    }

    public function getCreateur(): ?string
    {
        return $this->Createur;
    }

    public function setCreateur(?string $Createur): static
    {
        $this->Createur = $Createur;

        return $this;
    }
}
