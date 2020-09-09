<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategorieRepository::class)
 */
class Categorie
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
    private $nom_catg;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\OneToMany(targetEntity=Produit::class, mappedBy="categorie")
     */
    private $produit;

    /**
     * @ORM\ManyToOne(targetEntity=Categorie::class, inversedBy="parent")
     */
    private $parent;

    /**
     * @ORM\OneToMany(targetEntity=Categorie::class, mappedBy="sous_catg")
     */
    private $sous_catg;


    public function __construct()
    {
        $this->produit = new ArrayCollection();
        $this->sous_catg = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCatg(): ?string
    {
        return $this->nom_catg;
    }

    public function setNomCatg(string $nom_catg): self
    {
        $this->nom_catg = $nom_catg;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @return Collection|Produit[]
     */
    public function getProduit(): Collection
    {
        return $this->produit;
    }

    public function addProduit(Produit $produit): self
    {
        if (!$this->produit->contains($produit)) {
            $this->produit[] = $produit;
            $produit->setCategorie($this);
        }

        return $this;
    }

    public function removeProduit(Produit $produit): self
    {
        if ($this->produit->contains($produit)) {
            $this->produit->removeElement($produit);
            // set the owning side to null (unless already changed)
            if ($produit->getCategorie() === $this) {
                $produit->setCategorie(null);
            }
        }

        return $this;
    }

    public function getParent(): ?self
    {
        return $this->parent;
    }

    public function setParent(?self $parent): self
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getSousCatg(): Collection
    {
        return $this->sous_catg;
    }

    public function addSousCatg(self $sous_catg): self
    {
        if (!$this->sous_catg->contains($sous_catg)) {
            $this->sous_catg[] = $sous_catg;
            $sous_catg->setParent($this);
        }

        return $this;
    }

    public function removeSousCatg(self $sous_catg): self
    {
        if ($this->sous_catg->contains($sous_catg)) {
            $this->sous_catg->removeElement($sous_catg);
            // set the owning side to null (unless already changed)
            if ($sous_catg->getParent() === $this) {
                $sous_catg->setParent(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->nom_catg;
    }
}
