<?php

namespace App\Entity;

use App\Repository\PlatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PlatRepository::class)
 */
class Plat
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
    private $nomPlat;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=2)
     */
    private $prixU_HT;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $imd_name;

    /**
     * @ORM\OneToMany(targetEntity=Complement::class, mappedBy="plat")
     */
    private $complement;

    /**
     * @ORM\OneToMany(targetEntity=Commentaire::class, mappedBy="plat")
     */
    private $commentaire;

    /**
     * @ORM\OneToMany(targetEntity=LigneCommande::class, mappedBy="plat")
     */
    private $ligneCommande;

    public function __construct()
    {
        $this->complement = new ArrayCollection();
        $this->commentaire = new ArrayCollection();
        $this->ligneCommande = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomPlat(): ?string
    {
        return $this->nomPlat;
    }

    public function setNomPlat(string $nomPlat): self
    {
        $this->nomPlat = $nomPlat;

        return $this;
    }

    public function getPrixUHT(): ?string
    {
        return $this->prixU_HT;
    }

    public function setPrixUHT(string $prixU_HT): self
    {
        $this->prixU_HT = $prixU_HT;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getImdName(): ?string
    {
        return $this->imd_name;
    }

    public function setImdName(?string $imd_name): self
    {
        $this->imd_name = $imd_name;

        return $this;
    }

    /**
     * @return Collection|Complement[]
     */
    public function getComplement(): Collection
    {
        return $this->complement;
    }

    public function addComplement(Complement $complement): self
    {
        if (!$this->complement->contains($complement)) {
            $this->complement[] = $complement;
            $complement->setPlat($this);
        }

        return $this;
    }

    public function removeComplement(Complement $complement): self
    {
        if ($this->complement->contains($complement)) {
            $this->complement->removeElement($complement);
            // set the owning side to null (unless already changed)
            if ($complement->getPlat() === $this) {
                $complement->setPlat(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Commentaire[]
     */
    public function getCommentaire(): Collection
    {
        return $this->commentaire;
    }

    public function addCommentaire(Commentaire $commentaire): self
    {
        if (!$this->commentaire->contains($commentaire)) {
            $this->commentaire[] = $commentaire;
            $commentaire->setPlat($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): self
    {
        if ($this->commentaire->contains($commentaire)) {
            $this->commentaire->removeElement($commentaire);
            // set the owning side to null (unless already changed)
            if ($commentaire->getPlat() === $this) {
                $commentaire->setPlat(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|LigneCommande[]
     */
    public function getLigneCommande(): Collection
    {
        return $this->ligneCommande;
    }

    public function addLigneCommande(LigneCommande $ligneCommande): self
    {
        if (!$this->ligneCommande->contains($ligneCommande)) {
            $this->ligneCommande[] = $ligneCommande;
            $ligneCommande->setPlat($this);
        }

        return $this;
    }

    public function removeLigneCommande(LigneCommande $ligneCommande): self
    {
        if ($this->ligneCommande->contains($ligneCommande)) {
            $this->ligneCommande->removeElement($ligneCommande);
            // set the owning side to null (unless already changed)
            if ($ligneCommande->getPlat() === $this) {
                $ligneCommande->setPlat(null);
            }
        }

        return $this;
    }
}
