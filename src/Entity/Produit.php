<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProduitRepository::class)
 */
class Produit
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=Commentaire::class, mappedBy="produit")
     */
    private $commentaires;

    /**
     * @ORM\OneToOne(targetEntity=Boisson::class, cascade={"persist", "remove"})
     */
    private $boisson;

    /**
     * @ORM\OneToOne(targetEntity=Plat::class, cascade={"persist", "remove"})
     */
    private $plat;

    /**
     * @ORM\OneToOne(targetEntity=EntreeDessert::class, cascade={"persist", "remove"})
     */
    private $entree_dessert;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_catg;


    public function __construct()
    {
        $this->commentaires = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Commentaire[]
     */
    public function getCommentaires(): Collection
    {
        return $this->commentaires;
    }

    public function addCommentaire(Commentaire $commentaire): self
    {
        if (!$this->commentaires->contains($commentaire)) {
            $this->commentaires[] = $commentaire;
            $commentaire->setProduit($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): self
    {
        if ($this->commentaires->contains($commentaire)) {
            $this->commentaires->removeElement($commentaire);
            // set the owning side to null (unless already changed)
            if ($commentaire->getProduit() === $this) {
                $commentaire->setProduit(null);
            }
        }

        return $this;
    }

    public function getBoisson(): ?Boisson
    {
        return $this->boisson;
    }

    public function setBoisson(?Boisson $boisson): self
    {
        $this->boisson = $boisson;

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

    public function getEntreeDessert(): ?EntreeDessert
    {
        return $this->entree_dessert;
    }

    public function setEntreeDessert(?EntreeDessert $entree_dessert): self
    {
        $this->entree_dessert = $entree_dessert;

        return $this;
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

}
