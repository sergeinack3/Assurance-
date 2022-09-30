<?php

namespace App\Entity;

use App\Repository\CotisationRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Traits\Timestampable;

/**
 * @ORM\Entity(repositoryClass=CotisationRepository::class)
 * @ORM\HasLifecycleCallbacks
 */
class Cotisation
{

    use Timestampable;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $new_value;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $old_value;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $motif;

    /**
     * @ORM\ManyToOne(targetEntity=Membre::class, inversedBy="cotisations")
     */
    private $Membre;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNewValue(): ?float
    {
        return $this->new_value;
    }

    public function setNewValue(float $new_value): self
    {
        $this->new_value = $new_value;

        return $this;
    }

    public function getOldValue(): ?float
    {
        return $this->old_value;
    }

    public function setOldValue(?float $old_value): self
    {
        $this->old_value = $old_value;

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

    public function getMembre(): ?Membre
    {
        return $this->Membre;
    }

    public function setMembre(?Membre $Membre): self
    {
        $this->Membre = $Membre;

        return $this;
    }

}
