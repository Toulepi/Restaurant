<?php

namespace App\Entity;

use App\Repository\LigneCommandeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LigneCommandeRepository::class)
 */
class LigneCommande
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $qte;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=2, nullable=true)
     */
    private $pourcent_remise;

    public function __construct($quantite, $produit)
    {
        $this->quantite=$quantite;
        $this->produit=$produit;
    }

    /**
     * @ORM\ManyToOne(targetEntity=Commande::class, inversedBy="ligne_commande")
     * @ORM\JoinColumn(nullable=false)
     */
    private $commande;

    /**
     * @ORM\ManyToOne(targetEntity=Produit::class, inversedBy="ligne_commande")
     */
    private $produit;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQte(): ?int
    {
        return $this->qte;
    }

    public function setQte(int $qte): self
    {
        $this->qte = $qte;

        return $this;
    }

    public function getPourcentRemise(): ?string
    {
        return $this->pourcent_remise;
    }

    public function setPourcentRemise(?string $pourcent_remise): self
    {
        $this->pourcent_remise = $pourcent_remise;

        return $this;
    }

    public function getCommande(): ?Commande
    {
        return $this->commande;
    }

    public function setCommande(?Commande $commande): self
    {
        $this->commande = $commande;

        return $this;
    }

    public function getProduit(): ?Produit
    {
        return $this->produit;
    }

    public function setProduit(?Produit $produit): self
    {
        $this->produit = $produit;

        return $this;
    }

    public function getSousTotal()
    {
        //return $this->quantite * $this->getLivre()->getPrix();
        // to complete
        return ($this->quantite) * $this->getProduit()->getPrixProduit();
    }

    public function __toString()
    {
        return $this->getProduit()->getNomProduit();
    }
}
