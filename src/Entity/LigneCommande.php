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

    /**
     * @ORM\ManyToOne(targetEntity=Commande::class, inversedBy="ligneCommande")
     * @ORM\JoinColumn(nullable=false)
     */
    private $commande;

    /**
     * @ORM\ManyToOne(targetEntity=Produit::class, inversedBy="ligneCommandes")
     */
    private $type_produit;

    /**
     * @ORM\Column(type="integer")
     */
    private $identifiant_produit;


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

    public function getTypeProduit(): ?Produit
    {
        return $this->type_produit;
    }

    public function setTypeProduit(?Produit $type_produit): self
    {
        $this->type_produit = $type_produit;

        return $this;
    }

    public function getIdentifiantProduit(): ?int
    {
        return $this->identifiant_produit;
    }

    public function setIdentifiantProduit(int $identifiant_produit): self
    {
        $this->identifiant_produit = $identifiant_produit;

        return $this;
    }

}
