<?php

namespace App\Entity;

use App\Repository\ListeDefisRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ListeDefisRepository::class)]
class ListeDefis
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::ARRAY, nullable: true)]
    private ?array $Defis = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDefis(): ?array
    {
        return $this->Defis;
    }

    public function setDefis(?array $Defis): static
    {
        $this->Defis = $Defis;

        return $this;
    }
}
