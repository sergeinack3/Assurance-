<?php

namespace App\Entity;

use App\Repository\EmployeurRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Traits\Timestampable;

/**
 * @ORM\Entity(repositoryClass=EmployeurRepository::class)
 * @ORM\HasLifecycleCallbacks
 */
class Employeur
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
    private $nom_employeur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $motif;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEmployeur(): ?string
    {
        return $this->nom_employeur;
    }

    public function setNomEmployeur(string $nom_employeur): self
    {
        $this->nom_employeur = $nom_employeur;

        return $this;
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

    public function getMotif(): ?string
    {
        return $this->motif;
    }

    public function setMotif(string $motif): self
    {
        $this->motif = $motif;

        return $this;
    }
}
