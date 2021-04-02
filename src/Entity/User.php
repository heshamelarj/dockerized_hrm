<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use App\Traits\Timestamps;
/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @ORM\HasLifecycleCallbacks()
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
class User implements UserInterface
{
    use Timestamps;
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    protected $id;

    public function getId(): ?int
    {
        return $this->id;
    }
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */

    private $cin;

    /**
     * @ORM\Column(type="integer", length=255, unique=true)
     */

    private $som;

    /**
     * @ORM\Column(type="integer", length=255, unique=true)
     */
    /**

     * @ORM\Column(type="string", length=255, unique=true,nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $password;
    
    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @param mixed $roles
     */
    public function setRoles($roles): void
    {
        $this->roles = $roles;
    }

    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }
    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }
    /**
     * @ORM\Column(type="string", length=20)
     */
    private $poste_budgetaire;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $nom;


    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom_ar;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */

    private $prenom_1;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */

    private $prenom_2;


    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Image", inversedBy="user", cascade={"persist", "remove"})
     */
    private $photo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prenom_ar1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prenom_ar2;

    /**
     * @ORM\Column(type="date", nullable=true)
     */

    private $date_naissance;
    /**
     * @ORM\Column(type="date", nullable=true)
     */

    private $date_recrutement;


    /**
     * @ORM\Column(type="string", length=255)
     */

    private $lieu_naissance;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */

    private $lieu_naissance_ar;


    /**
     * @ORM\Column(type="string", length=255)
     */

    private $adresse;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */

    private $adresse_ar;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */

    private $telephone;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */

    private $fax;



    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Affectation", mappedBy="User", orphanRemoval=true)
     */
    private $affectations;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Autorisation", mappedBy="user")
     */
    private $autorisations;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Qualification", mappedBy="user")
     */
    private $qualifications;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Situation",  mappedBy="user", cascade={"persist"})
     */
    private $situations;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Mission", mappedBy="user")
     */
    private $missions;



    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Attestation", mappedBy="user", orphanRemoval=true)
     */
    private $attestations;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\SituationsFamiliale", mappedBy="user")
     */
    private $situations_familiale;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom_complet;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom_complet_ar;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Departement", inversedBy="users")
     */
    private $departement;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Cadre", inversedBy="users")
     * @ORM\JoinColumn(nullable=false)
     */
    private $cadre;

    public function __construct()
    {
        $this->affectations = new ArrayCollection();
        $this->autorisations = new ArrayCollection();
        $this->qualifications = new ArrayCollection();
        $this->situations = new ArrayCollection();
        $this->missions = new ArrayCollection();
        $this->attestations = new ArrayCollection();
        $this->situations_familiale = new ArrayCollection();
    }
    /**
     * @return mixed
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * @param mixed $fax
     */
    public function setFax($fax): void
    {
        $this->fax = $fax;
    }
    /**
     * @return mixed
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @param mixed $telephone
     */
    public function setTelephone($telephone): void
    {
        $this->telephone = $telephone;
    }


    /**
     * @return mixed
     */
    public function getAdresseAr()
    {
        return $this->adresse_ar;
    }

    /**
     * @param mixed $adresse_ar
     */
    public function setAdresseAr($adresse_ar): void
    {
        $this->adresse_ar = $adresse_ar;
    }

    /**
     * @return mixed
     */
    public function getPosteBudgetaire()
    {
        return $this->poste_budgetaire;
    }

    /**
     * @param mixed $poste_budgetaire
     */
    public function setPosteBudgetaire($poste_budgetaire): void
    {
        $this->poste_budgetaire = $poste_budgetaire;
    }

    /**
     * @return mixed
     */
    public function getSom()
    {
        return $this->som;
    }

    /**
     * @param mixed $som
     */
    public function setSom($som): void
    {
        $this->som = $som;
    }

  

    /**
     * @return mixed
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param mixed $adresse
     */
    public function setAdresse($adresse): void
    {
        $this->adresse = $adresse;
    }

    /**
     * @return mixed
     */
    public function getLieuNaissanceAr()
    {
        return $this->lieu_naissance_ar;
    }

    /**
     * @param mixed $lieu_naissance_ar
     */
    public function setLieuNaissanceAr($lieu_naissance_ar): void
    {
        $this->lieu_naissance_ar = $lieu_naissance_ar;
    }

    /**
     * @return mixed
     */
    public function getLieuNaissance()
    {
        return $this->lieu_naissance;
    }

    /**
     * @param mixed $lieu_naissance
     */
    public function setLieuNaissance($lieu_naissance): void
    {
        $this->lieu_naissance = $lieu_naissance;
    }

    /**
     * @return mixed
     */
    public function getCin()
    {
        return $this->cin;
    }

    /**
     * @param mixed $cin
     */
    public function setCin($cin): void
    {
        $this->cin = $cin;
    }
    /**
     * @return mixed
     */
    public function getDateRecrutement()
    {
        return $this->date_recrutement;
    }

    /**
     * @param mixed $date_recrutement
     */
    public function setDateRecrutement($date_recrutement): void
    {
        $this->date_recrutement = $date_recrutement;
    }




    /**
     * @return mixed
     */
    public function getDateNaissance()
    {
        return $this->date_naissance;
    }

    /**
     * @param mixed $date_naissance
     */
    public function setDateNaissance($date_naissance): void
    {
        $this->date_naissance = $date_naissance;
    }

   

    /**
     * @return mixed
     */
    public function getPrenom2()
    {
        return $this->prenom_2;
    }

    /**
     * @param mixed $prenom_2
     */
    public function setPrenom2($prenom_2): void
    {
        $this->prenom_2 = $prenom_2;
    }

    /**
     * @return mixed
     */
    public function getPrenom1()
    {
        return $this->prenom_1;
    }

    /**
     * @param mixed $prenom_1
     */
    public function setPrenom1($prenom_1): void
    {
        $this->prenom_1 = $prenom_1;
    }

    /**
     * @return mixed
     */
    public function getNomAr()
    {
        return $this->nom_ar;
    }

    /**
     * @param mixed $nom_ar
     */
    public function setNomAr($nom_ar): void
    {
        $this->nom_ar = $nom_ar;
    }







    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection|Affectation[]
     */
    public function getAffectations(): Collection
    {
        return $this->affectations;
    }

    public function addAffectation(Affectation $affectation): self
    {
        if (!$this->affectations->contains($affectation)) {
            $this->affectations[] = $affectation;
            $affectation->setUser($this);
        }

        return $this;
    }

    public function removeAffectation(Affectation $affectation): self
    {
        if ($this->affectations->contains($affectation)) {
            $this->affectations->removeElement($affectation);
            // set the owning side to null (unless already changed)
            if ($affectation->getUser() === $this) {
                $affectation->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Autorisation[]
     */
    public function getAutorisations(): Collection
    {
        return $this->autorisations;
    }

    public function addAutorisation(Autorisation $autorisation): self
    {
        if (!$this->autorisations->contains($autorisation)) {
            $this->autorisations[] = $autorisation;
            $autorisation->setUser($this);
        }

        return $this;
    }

    public function removeAutorisation(Autorisation $autorisation): self
    {
        if ($this->autorisations->contains($autorisation)) {
            $this->autorisations->removeElement($autorisation);
            // set the owning side to null (unless already changed)
            if ($autorisation->getUser() === $this) {
                $autorisation->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Qualification[]
     */
    public function getQualifications(): Collection
    {
        return $this->qualifications;
    }

    public function addQualification(Qualification $qualification): self
    {
        if (!$this->qualifications->contains($qualification)) {
            $this->qualifications[] = $qualification;
            $qualification->setUser($this);
        }

        return $this;
    }

    public function removeQualification(Qualification $qualification): self
    {
        if ($this->qualifications->contains($qualification)) {
            $this->qualifications->removeElement($qualification);
            // set the owning side to null (unless already changed)
            if ($qualification->getUser() === $this) {
                $qualification->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Situation[]
     */
    public function getSituations(): Collection
    {
        return $this->situations;
    }

    public function addSituation(Situation $situation): self
    {
        if (!$this->situations->contains($situation)) {
            $this->situations[] = $situation;
            $situation->setUser($this);
        }

        return $this;
    }

    public function removeSituation(Situation $situation): self
    {
        if ($this->situations->contains($situation)) {
            $this->situations->removeElement($situation);
            // set the owning side to null (unless already changed)
            if ($situation->getUser() === $this) {
                $situation->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Mission[]
     */
    public function getMissions(): Collection
    {
        return $this->missions;
    }

    public function addMission(Mission $mission): self
    {
        if (!$this->missions->contains($mission)) {
            $this->missions[] = $mission;
            $mission->setUser($this);
        }

        return $this;
    }

    public function removeMission(Mission $mission): self
    {
        if ($this->missions->contains($mission)) {
            $this->missions->removeElement($mission);
            // set the owning side to null (unless already changed)
            if ($mission->getUser() === $this) {
                $mission->setUser(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this.$this->id;
    }

    public function getPhoto(): ?Image
    {
        return $this->photo;
    }

    public function setPhoto(?Image $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getPrenomAr1(): ?string
    {
        return $this->prenom_ar1;
    }

    public function setPrenomAr1(string $prenom_ar1): self
    {
        $this->prenom_ar1 = $prenom_ar1;

        return $this;
    }

    public function getPrenomAr2(): ?string
    {
        return $this->prenom_ar2;
    }

    public function setPrenomAr2(?string $prenom_ar2): self
    {
        $this->prenom_ar2 = $prenom_ar2;

        return $this;
    }

    /**
     * @return Collection|Attestation[]
     */
    public function getAttestations(): Collection
    {
        return $this->attestations;
    }

    public function addAttestation(Attestation $attestation): self
    {
        if (!$this->attestations->contains($attestation)) {
            $this->attestations[] = $attestation;
            $attestation->setUser($this);
        }

        return $this;
    }

    public function removeAttestation(Attestation $attestation): self
    {
        if ($this->attestations->contains($attestation)) {
            $this->attestations->removeElement($attestation);
            // set the owning side to null (unless already changed)
            if ($attestation->getUser() === $this) {
                $attestation->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|SituationsFamiliale[]
     */
    public function getSituationsFamiliale(): Collection
    {
        return $this->situations_familiale;
    }

    public function addSituationsFamiliale(SituationsFamiliale $situationsFamiliale): self
    {
        if (!$this->situations_familiale->contains($situationsFamiliale)) {
            $this->situations_familiale[] = $situationsFamiliale;
            $situationsFamiliale->setUser($this);
        }

        return $this;
    }

    public function removeSituationsFamiliale(SituationsFamiliale $situationsFamiliale): self
    {
        if ($this->situations_familiale->contains($situationsFamiliale)) {
            $this->situations_familiale->removeElement($situationsFamiliale);
            // set the owning side to null (unless already changed)
            if ($situationsFamiliale->getUser() === $this) {
                $situationsFamiliale->setUser(null);
            }
        }

        return $this;
    }
   


    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    public function getPassword()
    {
        // TODO: Implement getPassword() method.
        return $this->password;
    }

    public function getUsername()
    {
        // TODO: Implement getUsername() method.
    }

   /* public function serialize()
    {
        return serialize(
            [
                $this->id,
                $this->cin,
                $this->password,
                $this->email
            ]
        );
    }

    public function unserialize($string)
    {
        list  (
                $this->id,
                $this->cin,
                $this->password,
                $this->email
        ) = unserialize($string, ['allowed_classes' => false]);
    }*/

    /**
     * @param mixed $password
     *
     * @return self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    public function getNomComplet(): ?string
    {
        return $this->nom_complet;
    }

    public function setNomComplet(?string $nom_complet): self
    {
        $this->nom_complet = $nom_complet;

        return $this;
    }

    public function getNomCompletAr(): ?string
    {
        return $this->nom_complet_ar;
    }

    public function setNomCompletAr(?string $nom_complet_ar): self
    {
        $this->nom_complet_ar = $nom_complet_ar;

        return $this;
    }

    public function getDepartement(): ?Departement
    {
        return $this->departement;
    }

    public function setDepartement(?Departement $departement): self
    {
        $this->departement = $departement;

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

