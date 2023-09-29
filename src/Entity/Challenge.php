<?php

namespace App\Entity;

use App\Repository\ChallengeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChallengeRepository::class)]
class Challenge
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $conditions = null;

    #[ORM\Column(length: 255)]
    private ?string $category = null;

    #[ORM\Column(length: 255)]
    private ?string $subcategory = null;

    #[ORM\Column]
    private ?int $points = null;

    #[ORM\Column(nullable: true)]
    private ?int $created_by = null;

    #[ORM\Column(nullable: true)]
        private ?int $created_at = null;

    #[ORM\Column]
    private ?int $status = null;

    #[ORM\OneToMany(mappedBy: 'challenge', targetEntity: CurrentChallenge::class, orphanRemoval: true)]
    private Collection $current_challenge;

    public function __construct()
    {
        $this->current_challenge = new ArrayCollection();
    }

    public function setAcceptedBy(?User $user): self
    {
        $this->acceptedBy = $user;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getConditions(): ?string
    {
        return $this->conditions;
    }

    public function setConditions(string $conditions): static
    {
        $this->conditions = $conditions;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): static
    {
        $this->category = $category;

        return $this;
    }

    public function getSubcategory(): ?string
    {
        return $this->subcategory;
    }

    public function setSubcategory(string $subcategory): static
    {
        $this->subcategory = $subcategory;

        return $this;
    }

    public function getPoints(): ?int
    {
        return $this->points;
    }

    public function setPoints(int $points): static
    {
        $this->points = $points;

        return $this;
    }

    public function getCreatedBy()
    {
        return $this->created_by;
    }

    public function setCreatedBy( $created_by): static
    {
        $this->created_by = $created_by;

        return $this;
    }
    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }


    public function setCreatedAt(): void
    {
        $this->created_at = new \DateTime("now");
    }


    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(int $status): static
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return Collection<int, CurrentChallenge>
     */
    public function getCurrentChallenge(): Collection
    {
        return $this->current_challenge;
    }

    public function addCurrentChallenge(CurrentChallenge $currentChallenge): static
    {
        if (!$this->current_challenge->contains($currentChallenge)) {
            $this->current_challenge->add($currentChallenge);
            $currentChallenge->setChallenge($this);
        }

        return $this;
    }

    public function removeCurrentChallenge(CurrentChallenge $currentChallenge): static
    {
        if ($this->current_challenge->removeElement($currentChallenge)) {
            // set the owning side to null (unless already changed)
            if ($currentChallenge->getChallenge() === $this) {
                $currentChallenge->setChallenge(null);
            }
        }

        return $this;
    }

}
