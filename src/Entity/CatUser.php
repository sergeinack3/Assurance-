<?php

namespace App\Entity;

use App\Entity\Traits\Timestampable;
use App\Repository\CatUserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CatUserRepository::class)
 * @ORM\Table(name="CatUsers")
 * @ORM\HasLifecycleCallbacks
 */
class CatUser
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
    private $libelle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="idCatUser")
     */
    private $idCat;

    public function __construct()
    {
        $this->idCat = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getIdCat(): Collection
    {
        return $this->idCat;
    }

    public function addIdCat(User $idCat): self
    {
        if (!$this->idCat->contains($idCat)) {
            $this->idCat[] = $idCat;
            $idCat->setIdCatUser($this);
        }

        return $this;
    }

    public function removeIdCat(User $idCat): self
    {
        if ($this->idCat->removeElement($idCat)) {
            // set the owning side to null (unless already changed)
            if ($idCat->getIdCatUser() === $this) {
                $idCat->setIdCatUser(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->libelle;
    }
}
