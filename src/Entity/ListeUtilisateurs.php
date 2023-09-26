<?php

namespace App\Entity;

use App\Repository\ListeUtilisateursRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ListeUtilisateursRepository::class)]
class ListeUtilisateurs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::ARRAY, nullable: true)]
    private ?array $Utilisateurs = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUtilisateurs(): ?array
    {
        return $this->Utilisateurs;
    }

    public function setUtilisateurs(?array $Utilisateurs): static
    {
        $this->Utilisateurs = $Utilisateurs;

        return $this;
    }
}
