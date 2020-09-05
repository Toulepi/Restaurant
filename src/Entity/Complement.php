<?php

namespace App\Entity;

use App\Repository\ComplementRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ComplementRepository::class)
 */
class Complement
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $nom_complement;

    /**
     * @ORM\ManyToOne(targetEntity=Plat::class, inversedBy="complement")
     */
    private $plat;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomComplement(): ?string
    {
        return $this->nom_complement;
    }

    public function setNomComplement(string $nom_complement): self
    {
        $this->nom_complement = $nom_complement;

        return $this;
    }

    public function getPlat(): ?Plat
    {
        return $this->plat;
    }

    public function setPlat(?Plat $plat): self
    {
        $this->plat = $plat;

        return $this;
    }
}
