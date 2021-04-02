<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use App\Traits\Timestamps;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AutorisationRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Autorisation
{    use Timestamps;


    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;



    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $type;

    /**
     * @ORM\Column(type="date")
     */
    private $date_debut;

    /**
     * @ORM\Column(type="date")
     */
    private $date_fin;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $motif;

    /**
     * @ORM\Column(type="text", nullable=true,nullable=true)
     */
    private $detail;





    /**
     * @ORM\Column(type="boolean")
     */
    private $granted = true;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="autorisations",cascade={"persist"})
     * @ORM\JoinColumn(nullable=false,name="user_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }
    /**
     * @return mixed
     */
    public function getisExceptional()
    {
        return $this->is_exceptional;
    }


    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->date_debut;
    }
    public function setDateDebut(\DateTimeInterface $date_debut): self
    {
        $this->date_debut = $date_debut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->date_fin;
    }

    public function setDateFin(\DateTimeInterface $date_fin): self
    {
        $this->date_fin = $date_fin;

        return $this;
    }


    public function getMotif(): ?string
    {
        return $this->motif;
    }

    public function setMotif(string $motif): self
    {
        $this->motif = $motif;

        return $this;
    }

    public function getDetail(): ?string
    {
        return $this->detail;
    }

    public function setDetail(?string $detail): self
    {
        $this->detail = $detail;

        return $this;
    }


    public function getGranted(): ?bool
    {
        return $this->granted;
    }

    public function setGranted(bool $granted): self
    {
        $this->granted = $granted;

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
