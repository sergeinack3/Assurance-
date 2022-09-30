<?php

namespace App\Entity;

use App\Entity\Traits\Timestampable;
use App\Repository\RemboursementRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RemboursementRepository::class)
 * @ORM\HasLifecycleCallbacks
 */
class Remboursement
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
    private $motant;

    /**
     * @ORM\ManyToOne(targetEntity=Emprunt::class, inversedBy="remboursements")
     */
    private $pret;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMotant(): ?float
    {
        return $this->motant;
    }

    public function setMotant(float $motant): self
    {
        $this->motant = $motant;

        return $this;
    }

    public function getPret(): ?Emprunt
    {
        return $this->pret;
    }

    public function setPret(?Emprunt $pret): self
    {
        $this->pret = $pret;

        return $this;
    }
}
