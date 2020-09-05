<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommandeRepository::class)
 */
class Commande
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
    private $num_cmd;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $adress_livr;

    /**
     * @ORM\Column(type="date")
     */
    private $date_cmd;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="commande")
     */
    private $client;

    /**
     * @ORM\OneToMany(targetEntity=LigneCommande::class, mappedBy="commande", orphanRemoval=true)
     */
    private $ligneCommande;

    /**
     * @ORM\OneToMany(targetEntity=Facture::class, mappedBy="commande", orphanRemoval=true)
     */
    private $facture;

    public function __construct()
    {
        $this->ligneCommande = new ArrayCollection();
        $this->facture = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumCmd(): ?string
    {
        return $this->num_cmd;
    }

    public function setNumCmd(string $num_cmd): self
    {
        $this->num_cmd = $num_cmd;

        return $this;
    }

    public function getAdressLivr(): ?string
    {
        return $this->adress_livr;
    }

    public function setAdressLivr(?string $adress_livr): self
    {
        $this->adress_livr = $adress_livr;

        return $this;
    }

    public function getDateCmd(): ?\DateTimeInterface
    {
        return $this->date_cmd;
    }

    public function setDateCmd(\DateTimeInterface $date_cmd): self
    {
        $this->date_cmd = $date_cmd;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

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
            $ligneCommande->setCommande($this);
        }

        return $this;
    }

    public function removeLigneCommande(LigneCommande $ligneCommande): self
    {
        if ($this->ligneCommande->contains($ligneCommande)) {
            $this->ligneCommande->removeElement($ligneCommande);
            // set the owning side to null (unless already changed)
            if ($ligneCommande->getCommande() === $this) {
                $ligneCommande->setCommande(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Facture[]
     */
    public function getFacture(): Collection
    {
        return $this->facture;
    }

    public function addFacture(Facture $facture): self
    {
        if (!$this->facture->contains($facture)) {
            $this->facture[] = $facture;
            $facture->setCommande($this);
        }

        return $this;
    }

    public function removeFacture(Facture $facture): self
    {
        if ($this->facture->contains($facture)) {
            $this->facture->removeElement($facture);
            // set the owning side to null (unless already changed)
            if ($facture->getCommande() === $this) {
                $facture->setCommande(null);
            }
        }

        return $this;
    }
}
