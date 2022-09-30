<?php

namespace App\Entity;

use App\Repository\PossederRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PossederRepository::class)
 */
class Posseder
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Role::class)
     */
    private $idRole;

    /**
     * @ORM\ManyToOne(targetEntity=CatUser::class)
     */
    private $idCatUser;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getidRole(): ?Role
    {
        return $this->idRole;
    }

    public function setidRole(?Role $idRole): self
    {
        $this->idRole = $idRole;

        return $this;
    }

    public function getIdCatUser(): ?CatUser
    {
        return $this->idCatUser;
    }

    public function setIdCatUser(?CatUser $idCatUser): self
    {
        $this->idCatUser = $idCatUser;

        return $this;
    }
}
