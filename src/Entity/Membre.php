<?php

namespace App\Entity;

use App\Repository\MembreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Traits\Timestampable;

/**
 * @ORM\Entity(repositoryClass=MembreRepository::class)
 * @ORM\HasLifecycleCallbacks
 */
class Membre
{

    use Timestampable;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sex;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $grade;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="float")
     */
    private $cotisation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $work_place;

    /**
     * @ORM\Column(type="date")
     */
    private $date_birth;

    /**
     * @ORM\Column(type="integer")
     */
    private $phone_number;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_cart;

    /**
     * @ORM\Column(type="date")
     */
    private $hiring_date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sate_member;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $motif;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="refUser")
     */
    private $idUser;

    /**
     * @ORM\OneToMany(targetEntity=Emprunt::class, mappedBy="idMembre")
     */
    private $refEmprunt;

    /**
     * @ORM\OneToMany(targetEntity=Cotisation::class, mappedBy="Membre")
     */
    private $cotisations;

    public function __construct()
    {
        $this->refEmprunt = new ArrayCollection();
        $this->cotisations = new ArrayCollection();
        $this->motif = 'Aucun';
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getSex(): ?string
    {
        return $this->sex;
    }

    public function setSex(string $sex): self
    {
        $this->sex = $sex;

        return $this;
    }

    public function getGrade(): ?string
    {
        return $this->grade;
    }

    public function setGrade(string $grade): self
    {
        $this->grade = $grade;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getCotisation(): ?float
    {
        return $this->cotisation;
    }

    public function setCotisation(float $cotisation): self
    {
        $this->cotisation = $cotisation;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getWorkPlace(): ?string
    {
        return $this->work_place;
    }

    public function setWorkPlace(string $work_place): self
    {
        $this->work_place = $work_place;

        return $this;
    }

    public function getDateBirth(): ?\DateTimeInterface
    {
        return $this->date_birth;
    }

    public function setDateBirth(\DateTimeInterface $date_birth): self
    {
        $this->date_birth = $date_birth;

        return $this;
    }

    public function getPhoneNumber(): ?int
    {
        return $this->phone_number;
    }

    public function setPhoneNumber(int $phone_number): self
    {
        $this->phone_number = $phone_number;

        return $this;
    }

    public function getIdCart(): ?int
    {
        return $this->id_cart;
    }

    public function setIdCart(int $id_cart): self
    {
        $this->id_cart = $id_cart;

        return $this;
    }

    public function getHiringDate(): ?\DateTimeInterface
    {
        return $this->hiring_date;
    }

    public function setHiringDate(\DateTimeInterface $hiring_date): self
    {
        $this->hiring_date = $hiring_date;

        return $this;
    }

    public function getSateMember(): ?string
    {
        return $this->sate_member;
    }

    public function setSateMember(string $sate_member): self
    {
        $this->sate_member = $sate_member;

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

    public function getIdUser(): ?User
    {
        return $this->idUser;
    }

    public function setIdUser(?User $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * @return Collection|Emprunt[]
     */
    public function getRefEmprunt(): Collection
    {
        return $this->refEmprunt;
    }

    public function addRefEmprunt(Emprunt $refEmprunt): self
    {
        if (!$this->refEmprunt->contains($refEmprunt)) {
            $this->refEmprunt[] = $refEmprunt;
            $refEmprunt->setIdMembre($this);
        }

        return $this;
    }

    public function removeRefEmprunt(Emprunt $refEmprunt): self
    {
        if ($this->refEmprunt->removeElement($refEmprunt)) {
            // set the owning side to null (unless already changed)
            if ($refEmprunt->getIdMembre() === $this) {
                $refEmprunt->setIdMembre(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Cotisation[]
     */
    public function getCotisations(): Collection
    {
        return $this->cotisations;
    }

    public function addCotisation(Cotisation $cotisation): self
    {
        if (!$this->cotisations->contains($cotisation)) {
            $this->cotisations[] = $cotisation;
            $cotisation->setMembre($this);
        }

        return $this;
    }

    public function removeCotisation(Cotisation $cotisation): self
    {
        if ($this->cotisations->removeElement($cotisation)) {
            // set the owning side to null (unless already changed)
            if ($cotisation->getMembre() === $this) {
                $cotisation->setMembre(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->firstname.' '. $this->lastname;
    }

}
