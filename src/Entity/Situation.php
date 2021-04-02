<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Traits\Timestamps;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SituationRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Situation
{    use Timestamps;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $echelon;

    /**
     * @ORM\Column(type="date")
     */
    private $date_effet;

    /**
     * @ORM\Column(type="integer")
     */
    private $numero_indocatif;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $remarks;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="situations", cascade={"persist","remove"})
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Cadre", inversedBy="situations", cascade={"persist","remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $cadre;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEchelon(): ?int
    {
        return $this->echelon;
    }

    public function setEchelon(int $echelon): self
    {
        $this->echelon = $echelon;

        return $this;
    }

    public function getDateEffet(): ?\DateTimeInterface
    {
        return $this->date_effet;
    }

    public function setDateEffet(\DateTimeInterface $date_effet): self
    {
        $this->date_effet = $date_effet;

        return $this;
    }

    public function getNumeroIndocatif(): ?int
    {
        return $this->numero_indocatif;
    }

    public function setNumeroIndocatif(int $numero_indocatif): self
    {
        $this->numero_indocatif = $numero_indocatif;

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
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getCadre(): ?Cadre
    {
        return $this->cadre;
    }

    public function setCadre(?Cadre $cadre): self
    {
        $this->cadre = $cadre;

        return $this;
    }

}
