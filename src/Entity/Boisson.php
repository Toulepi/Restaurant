<?php

namespace App\Entity;

use App\Repository\BoissonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BoissonRepository::class)
 */
class Boisson
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nom_boisson;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=2)
     */
    private $prix_boisson;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $img_boisson;

    /**
     * @ORM\OneToMany(targetEntity=LigneCommande::class, mappedBy="boisson")
     */
    private $ligneCommandes;

    public function __construct()
    {
        $this->ligneCommandes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomBoisson(): ?string
    {
        return $this->nom_boisson;
    }

    public function setNomBoisson(string $nom_boisson): self
    {
        $this->nom_boisson = $nom_boisson;

        return $this;
    }

    public function getPrixBoisson(): ?string
    {
        return $this->prix_boisson;
    }

    public function setPrixBoisson(string $prix_boisson): self
    {
        $this->prix_boisson = $prix_boisson;

        return $this;
    }

    public function getImgBoisson(): ?string
    {
        return $this->img_boisson;
    }

    public function setImgBoisson(?string $img_boisson): self
    {
        $this->img_boisson = $img_boisson;

        return $this;
    }

    /**
     * @return Collection|LigneCommande[]
     */
    public function getLigneCommandes(): Collection
    {
        return $this->ligneCommandes;
    }

    public function addLigneCommande(LigneCommande $ligneCommande): self
    {
        if (!$this->ligneCommandes->contains($ligneCommande)) {
            $this->ligneCommandes[] = $ligneCommande;
            $ligneCommande->setBoisson($this);
        }

        return $this;
    }

    public function removeLigneCommande(LigneCommande $ligneCommande): self
    {
        if ($this->ligneCommandes->contains($ligneCommande)) {
            $this->ligneCommandes->removeElement($ligneCommande);
            // set the owning side to null (unless already changed)
            if ($ligneCommande->getBoisson() === $this) {
                $ligneCommande->setBoisson(null);
            }
        }

        return $this;
    }
}
