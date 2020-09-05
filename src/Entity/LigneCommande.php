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
     * @ORM\ManyToOne(targetEntity=Boisson::class, inversedBy="ligneCommande")
     */
    private $boisson;

    /**
     * @ORM\ManyToOne(targetEntity=EntreeDessert::class, inversedBy="ligneCommande")
     */
    private $entreeDessert;

    /**
     * @ORM\ManyToOne(targetEntity=Plat::class, inversedBy="ligneCommande")
     */
    private $plat;

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

    public function getBoisson(): ?Boisson
    {
        return $this->boisson;
    }

    public function setBoisson(?Boisson $boisson): self
    {
        $this->boisson = $boisson;

        return $this;
    }

    public function getEntreeDessert(): ?EntreeDessert
    {
        return $this->entreeDessert;
    }

    public function setEntreeDessert(?EntreeDessert $entreeDessert): self
    {
        $this->entreeDessert = $entreeDessert;

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
