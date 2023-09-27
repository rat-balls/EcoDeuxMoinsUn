<?php

namespace App\Entity;

use App\Repository\CurrentChallengeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CurrentChallengeRepository::class)]
class CurrentChallenge
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $user_id = null;

    #[ORM\Column(nullable: true)]
    private ?int $challenge_id = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTime $created_at = null;

    #[ORM\Column(nullable: true)]
    private ?int $status = null;

    #[ORM\ManyToOne(inversedBy: 'challenges')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\OneToOne(mappedBy: 'current_challenge', cascade: ['persist', 'remove'])]
    private ?Challenge $challenge = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): static
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getChallengeId(): ?int
    {
        return $this->challenge_id;
    }

    public function setChallengeId(?int $challenge_id): static
    {
        $this->challenge_id = $challenge_id;

        return $this;
    }

    public function getCreatedAt(): ?\DateTime
    {
        return $this->created_at;
    }

    public function setCreatedAt(?\DateTime $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(?int $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getChallenge(): ?Challenge
    {
        return $this->challenge;
    }

    public function setChallenge(?Challenge $challenge): static
    {
        // unset the owning side of the relation if necessary
        if ($challenge === null && $this->challenge !== null) {
            $this->challenge->setCurrentChallenge(null);
        }

        // set the owning side of the relation if necessary
        if ($challenge !== null && $challenge->getCurrentChallenge() !== $this) {
            $challenge->setCurrentChallenge($this);
        }

        $this->challenge = $challenge;

        return $this;
    }
}
