<?php

namespace App\Entity;

use App\Repository\PlatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Entity\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=PlatRepository::class)
 * @Vich\Uploadable
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
     * @ORM\Column(type="text")
     */
    private $description;


    /**
     * @ORM\OneToMany(targetEntity=Complement::class, mappedBy="plat")
     */
    private $complement;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=2)
     */
    private $prix_plat;

    /**
     * @ORM\Column(type="string", length=200)
     * @var string|null
     */
    private $img_plat;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="image_plat", fileNameProperty="img_plat")
     *
     * @var File|null
     */
    private $imageFile;

    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTimeInterface|null
     */
    private $updatedAt;

    /**
     * @param File|null $imageFile
     */
    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    /**
     * @ORM\OneToMany(targetEntity=LigneCommande::class, mappedBy="plat")
     */
    private $ligneCommandes;

    public function __construct()
    {
        $this->complement = new ArrayCollection();
        $this->ligneCommandes = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

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


    public function getPrixPlat(): ?string
    {
        return $this->prix_plat;
    }

    public function setPrixPlat(string $prix_plat): self
    {
        $this->prix_plat = $prix_plat;

        return $this;
    }

    public function getImgPlat(): ?string
    {
        return $this->img_plat;
    }

    public function setImgPlat(string $img_plat): self
    {
        $this->img_plat = $img_plat;

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
            $ligneCommande->setPlat($this);
        }

        return $this;
    }

    public function removeLigneCommande(LigneCommande $ligneCommande): self
    {
        if ($this->ligneCommandes->contains($ligneCommande)) {
            $this->ligneCommandes->removeElement($ligneCommande);
            // set the owning side to null (unless already changed)
            if ($ligneCommande->getPlat() === $this) {
                $ligneCommande->setPlat(null);
            }
        }

        return $this;
    }

}
