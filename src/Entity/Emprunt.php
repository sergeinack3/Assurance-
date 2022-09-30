<?php

namespace App\Entity;

use App\Repository\EmpruntRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Traits\Timestampable;

/**
 * @ORM\Entity(repositoryClass=EmpruntRepository::class)
 * @ORM\HasLifecycleCallbacks
 */
class Emprunt
{

    use Timestampable;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string",length=25)
     */
    private $numero_emprunt;

    /**
     * @ORM\Column(type="float")
     */
    private $valeur_emprunt;

    /**
     * @ORM\Column(type="date")
     */
    private $echeance;

    /**
     * @ORM\Column(type="float")
     */
    private $taux_interet;

    /**
     * @ORM\Column(type="float")
     */
    private $interet_general;

    /**
     * @ORM\Column(type="float")
     */
    private $interet_mensuel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $motif;

    /**
     * @ORM\ManyToOne(targetEntity=Membre::class, inversedBy="refEmprunt")
     */
    private $idMembre;

    /**
     * @ORM\ManyToOne(targetEntity=ModePayment::class, inversedBy="emprunts")
     */
    private $idModPay;

    /**
     * @ORM\OneToMany(targetEntity=Remboursement::class, mappedBy="pret")
     */
    private $remboursements;

    public function __construct()
    {
        $this->remboursements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroEmprunt(): ?string
    {
        return $this->numero_emprunt;
    }

    public function setNumeroEmprunt(string $numero_emprunt): self
    {
        $this->numero_emprunt = $numero_emprunt;

        return $this;
    }

    public function getValeurEmprunt(): ?float
    {
        return $this->valeur_emprunt;
    }

    public function setValeurEmprunt(float $valeur_emprunt): self
    {
        $this->valeur_emprunt = $valeur_emprunt;

        return $this;
    }

    public function getEcheance(): ?\DateTimeInterface
    {
        return $this->echeance;
    }

    public function setEcheance(\DateTimeInterface $echeance): self
    {
        $this->echeance = $echeance;

        return $this;
    }

    public function getTauxInteret(): ?float
    {
        return $this->taux_interet;
    }

    public function setTauxInteret(float $taux_interet): self
    {
        $this->taux_interet = $taux_interet;

        return $this;
    }

    public function getInteretGeneral(): ?float
    {
        return $this->interet_general;
    }

    public function setInteretGeneral(float $interet_general): self
    {
        $this->interet_general = $interet_general;

        return $this;
    }

    public function getInteretMensuel(): ?float
    {
        return $this->interet_mensuel;
    }

    public function setInteretMensuel(float $interet_mensuel): self
    {
        $this->interet_mensuel = $interet_mensuel;

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

    public function getIdMembre(): ?Membre
    {
        return $this->idMembre;
    }

    public function setIdMembre(?Membre $idMembre): self
    {
        $this->idMembre = $idMembre;

        return $this;
    }

    public function getIdModPay(): ?ModePayment
    {
        return $this->idModPay;
    }

    public function setIdModPay(?ModePayment $idModPay): self
    {
        $this->idModPay = $idModPay;

        return $this;
    }

    /**
     * @return Collection|Remboursement[]
     */
    public function getRemboursements(): Collection
    {
        return $this->remboursements;
    }

    public function addRemboursement(Remboursement $remboursement): self
    {
        if (!$this->remboursements->contains($remboursement)) {
            $this->remboursements[] = $remboursement;
            $remboursement->setPret($this);
        }

        return $this;
    }

    public function removeRemboursement(Remboursement $remboursement): self
    {
        if ($this->remboursements->removeElement($remboursement)) {
            // set the owning side to null (unless already changed)
            if ($remboursement->getPret() === $this) {
                $remboursement->setPret(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->numero_emprunt;
    }
}
