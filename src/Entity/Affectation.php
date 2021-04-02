<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Traits\Timestamps;
/**
 * @ORM\Entity(repositoryClass="App\Repository\AffectationRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Affectation
{
    use Timestamps;
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $poste;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_affectation;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date_detachement;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $remarks;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="affectations", cascade={"persist"})
     * @ORM\JoinColumn(name="User_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $User;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Service", inversedBy="affectations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $service;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPoste(): ?string
    {
        return $this->poste;
    }

    public function setPoste(string $poste): self
    {
        $this->poste = $poste;

        return $this;
    }

    public function getDateAffectation(): ?\DateTimeInterface
    {
        return $this->date_affectation;
    }

    public function setDateAffectation(\DateTimeInterface $date_affectation): self
    {
        $this->date_affectation = $date_affectation;

        return $this;
    }

    public function getDateDetachement(): ?\DateTimeInterface
    {
        return $this->date_detachement;
    }

    public function setDateDetachement(?\DateTimeInterface $date_detachement): self
    {
        $this->date_detachement = $date_detachement;

        return $this;
    }

    public function getRemarks(): ?string
    {
        return $this->remarks;
    }

    public function setRemarks(?string $remarks): self
    {
        $this->remarks = $remarks;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->User;
    }

    public function setUser(?User $User): self
    {
        $this->User = $User;

        return $this;
    }

    public function getService(): ?Service
    {
        return $this->service;
    }

    public function setService(?Service $service): self
    {
        $this->service = $service;

        return $this;
    }

}
