<?php

namespace App\Entity;

use App\Repository\EntreeDessertRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EntreeDessertRepository::class)
 */
class EntreeDessert
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nom_entr_dess;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=2)
     */
    private $prixEntDss;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $img_entr_dess;

    /**
     * @ORM\OneToMany(targetEntity=LigneCommande::class, mappedBy="entree_dessert")
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

    public function getNomEntrDess(): ?string
    {
        return $this->nom_entr_dess;
    }

    public function setNomEntrDess(string $nom_entr_dess): self
    {
        $this->nom_entr_dess = $nom_entr_dess;

        return $this;
    }

    public function getPrixEntDss(): ?string
    {
        return $this->prixEntDss;
    }

    public function setPrixEntDss(string $prixEntDss): self
    {
        $this->prixEntDss = $prixEntDss;

        return $this;
    }

    public function getImgEntrDess(): ?string
    {
        return $this->img_entr_dess;
    }

    public function setImgEntrDess(?string $img_entr_dess): self
    {
        $this->img_entr_dess = $img_entr_dess;

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
            $ligneCommande->setEntreeDessert($this);
        }

        return $this;
    }

    public function removeLigneCommande(LigneCommande $ligneCommande): self
    {
        if ($this->ligneCommandes->contains($ligneCommande)) {
            $this->ligneCommandes->removeElement($ligneCommande);
            // set the owning side to null (unless already changed)
            if ($ligneCommande->getEntreeDessert() === $this) {
                $ligneCommande->setEntreeDessert(null);
            }
        }

        return $this;
    }
}
