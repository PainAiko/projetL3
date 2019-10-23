<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProduitRepository")
 */
class Produit
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $libelle;

    /**
     * @ORM\Column(type="float")
     */
    private $pa;

    /**
     * @ORM\Column(type="float")
     */
    private $pv;

    /**
     * @ORM\Column(type="integer")
     */
    private $tva;

    /**
     * @ORM\Column(type="integer")
     */
    private $stock;

    /**
     * @ORM\Column(type="integer")
     */
    private $stockInit;

    /**
     * @ORM\Column(type="integer")
     */
    private $stockAl;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Famille", inversedBy="produits")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_famille;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Commande", mappedBy="id_produit")
     */
    private $qte;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="produits")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_categorie;

    public function __construct()
    {
        $this->qte = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getPa(): ?float
    {
        return $this->pa;
    }

    public function setPa(float $pa): self
    {
        $this->pa = $pa;

        return $this;
    }

    public function getPv(): ?float
    {
        return $this->pv;
    }

    public function setPv(float $pv): self
    {
        $this->pv = $pv;

        return $this;
    }

    public function getTva(): ?int
    {
        return $this->tva;
    }

    public function setTva(int $tva): self
    {
        $this->tva = $tva;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(int $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    public function getStockInit(): ?int
    {
        return $this->stockInit;
    }

    public function setStockInit(int $stockInit): self
    {
        $this->stockInit = $stockInit;

        return $this;
    }

    public function getStockAl(): ?int
    {
        return $this->stockAl;
    }

    public function setStockAl(int $stockAl): self
    {
        $this->stockAl = $stockAl;

        return $this;
    }

    public function getIdFamille(): ?Famille
    {
        return $this->id_famille;
    }

    public function setIdFamille(?Famille $id_famille): self
    {
        $this->id_famille = $id_famille;

        return $this;
    }

    /**
     * @return Collection|Commande[]
     */
    public function getQte(): Collection
    {
        return $this->qte;
    }

    public function addQte(Commande $qte): self
    {
        if (!$this->qte->contains($qte)) {
            $this->qte[] = $qte;
            $qte->addIdProduit($this);
        }

        return $this;
    }

    public function removeQte(Commande $qte): self
    {
        if ($this->qte->contains($qte)) {
            $this->qte->removeElement($qte);
            $qte->removeIdProduit($this);
        }

        return $this;
    }

    public function getIdCategorie(): ?Category
    {
        return $this->id_categorie;
    }

    public function setIdCategorie(?Category $id_categorie): self
    {
        $this->id_categorie = $id_categorie;

        return $this;
    }
}
