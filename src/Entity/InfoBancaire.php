<?php

namespace App\Entity;

use App\Repository\InfoBancaireRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InfoBancaireRepository::class)
 */
class InfoBancaire
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomCarte;

    /**
     * @ORM\OneToOne(targetEntity=Client::class, inversedBy="infoBancaire", cascade={"persist", "remove"})
     */
    private $client;

    /**
     * @ORM\Column(type="string", length=16)
     */
    private $numeroCarte;

    /**
     * @ORM\Column(type="date")
     */
    private $date_validite;

    /**
     * @ORM\Column(type="string", length=3)
     */
    private $cvv;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCarte(): ?string
    {
        return $this->nomCarte;
    }

    public function setNomCarte(string $nomCarte): self
    {
        $this->nomCarte = $nomCarte;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getNumeroCarte(): ?string
    {
        return $this->numeroCarte;
    }

    public function setNumeroCarte(string $numeroCarte): self
    {
        $this->numeroCarte = $numeroCarte;

        return $this;
    }

    public function getDateValidite(): ?\DateTimeInterface
    {
        return $this->date_validite;
    }

    public function setDateValidite(\DateTimeInterface $date_validite): self
    {
        $this->date_validite = $date_validite;

        return $this;
    }

    public function getCvv(): ?string
    {
        return $this->cvv;
    }

    public function setCvv(string $cvv): self
    {
        $this->cvv = $cvv;

        return $this;
    }
}
