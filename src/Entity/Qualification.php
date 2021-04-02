<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Traits\Timestamps;

/**
 * @ORM\Entity(repositoryClass="App\Repository\QualificationRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Qualification
{    use Timestamps;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $partie_delivrante;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_obtention;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $mension;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $remarks;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="qualifications" ,cascade={"persist","remove"})
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Diplome", inversedBy="qualifications")
     * @ORM\JoinColumn(nullable=false)
     */
    private $diplome;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPartieDelivrante(): ?string
    {
        return $this->partie_delivrante;
    }

    public function setPartieDelivrante(string $partie_delivrante): self
    {
        $this->partie_delivrante = $partie_delivrante;

        return $this;
    }

    public function getDateObtention(): ?\DateTimeInterface
    {
        return $this->date_obtention;
    }

    public function setDateObtention(\DateTimeInterface $date_obtention): self
    {
        $this->date_obtention = $date_obtention;

        return $this;
    }

    public function getMension(): ?string
    {
        return $this->mension;
    }

    public function setMension(?string $mension): self
    {
        $this->mension = $mension;

        return $this;
    }

    public function getRemarks(): ?string
    {
        return $this->remarks;
    }

    public function setRemarks(string $remarks): self
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

    public function getDiplome(): ?Diplome
    {
        return $this->diplome;
    }

    public function setDiplome(?Diplome $diplome): self
    {
        $this->diplome = $diplome;

        return $this;
    }

}
