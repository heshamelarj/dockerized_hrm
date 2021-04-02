<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SituationsFamilialeRepository")
 */
class SituationsFamiliale
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $situation_familiale;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date;
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nb_enfants;

    /**
     * @return mixed
     */
    public function getNbEnfants()
    {
        return $this->nb_enfants;
    }

    /**
     * @param mixed $nb_enfants
     */
    public function setNbEnfants($nb_enfants): void
    {
        $this->nb_enfants = $nb_enfants;
    }

    /**
     * @ORM\Column(type="string", length=255)
     */
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="situations_familiale")
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSituationFamiliale(): ?string
    {
        return $this->situation_familiale;
    }

    public function setSituationFamiliale(string $situation_familiale): self
    {
        $this->situation_familiale = $situation_familiale;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
