<?php

namespace App\Entity;

use App\Repository\CommandRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommandRepository::class)
 */
class Command
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $commandDate;

    /**
     * @ORM\Column(type="integer")
     */
    private $total_price;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $status;

    /**
     * @ORM\ManyToMany(targetEntity=Plat::class)
     */
    private $meal;

    /**
     * @ORM\ManyToOne(targetEntity=Livreur::class, inversedBy="commands")
     * @ORM\JoinColumn(nullable=false)
     */
    private $livreur;

    /**
     * @ORM\ManyToOne(targetEntity=Adresse::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $adresse;

    public function __construct()
    {
        $this->meal = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCommandDate(): ?\DateTimeInterface
    {
        return $this->commandDate;
    }

    public function setCommandDate(\DateTimeInterface $commandDate): self
    {
        $this->commandDate = $commandDate;

        return $this;
    }

    public function getTotalPrice(): ?int
    {
        return $this->total_price;
    }

    public function setTotalPrice(int $total_price): self
    {
        $this->total_price = $total_price;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return Collection|Plat[]
     */
    public function getMeal(): Collection
    {
        return $this->meal;
    }

    public function addMeal(Plat $meal): self
    {
        if (!$this->meal->contains($meal)) {
            $this->meal[] = $meal;
        }

        return $this;
    }

    public function removeMeal(Plat $meal): self
    {
        if ($this->meal->contains($meal)) {
            $this->meal->removeElement($meal);
        }

        return $this;
    }

    public function getLivreur(): ?Livreur
    {
        return $this->livreur;
    }

    public function setLivreur(?Livreur $livreur): self
    {
        $this->livreur = $livreur;

        return $this;
    }

    public function getAdresse(): ?Adresse
    {
        return $this->adresse;
    }

    public function setAdresse(?Adresse $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }
}
