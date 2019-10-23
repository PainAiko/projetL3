<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ClientRepository")
 */
class Client
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
    private $designation;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $respComm;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $respFin;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $adrLiv;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $adrFac;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $tel;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $portable;

    /**
     * @ORM\Column(type="string", length=16)
     */
    private $fax;

    /**
     * @ORM\Column(type="string", length=160)
     */
    private $email;

    /**
     * @ORM\Column(type="float")
     */
    private $soldeInit;

    /**
     * @ORM\Column(type="float")
     */
    private $solde;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Commande", mappedBy="id_client")
     */
    private $commandes;

    public function __construct()
    {
        $this->commandes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function setDesignation(string $designation): self
    {
        $this->designation = $designation;

        return $this;
    }

    public function getRespComm(): ?string
    {
        return $this->respComm;
    }

    public function setRespComm(string $respComm): self
    {
        $this->respComm = $respComm;

        return $this;
    }

    public function getRespFin(): ?string
    {
        return $this->respFin;
    }

    public function setRespFin(string $respFin): self
    {
        $this->respFin = $respFin;

        return $this;
    }

    public function getAdrLiv(): ?string
    {
        return $this->adrLiv;
    }

    public function setAdrLiv(string $adrLiv): self
    {
        $this->adrLiv = $adrLiv;

        return $this;
    }

    public function getAdrFac(): ?string
    {
        return $this->adrFac;
    }

    public function setAdrFac(string $adrFac): self
    {
        $this->adrFac = $adrFac;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getPortable(): ?string
    {
        return $this->portable;
    }

    public function setPortable(string $portable): self
    {
        $this->portable = $portable;

        return $this;
    }

    public function getFax(): ?string
    {
        return $this->fax;
    }

    public function setFax(string $fax): self
    {
        $this->fax = $fax;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getSoldeInit(): ?float
    {
        return $this->soldeInit;
    }

    public function setSoldeInit(float $soldeInit): self
    {
        $this->soldeInit = $soldeInit;

        return $this;
    }

    public function getSolde(): ?float
    {
        return $this->solde;
    }

    public function setSolde(float $solde): self
    {
        $this->solde = $solde;

        return $this;
    }

    /**
     * @return Collection|Commande[]
     */
    public function getCommandes(): Collection
    {
        return $this->commandes;
    }

    public function addCommande(Commande $commande): self
    {
        if (!$this->commandes->contains($commande)) {
            $this->commandes[] = $commande;
            $commande->setIdClient($this);
        }

        return $this;
    }

    public function removeCommande(Commande $commande): self
    {
        if ($this->commandes->contains($commande)) {
            $this->commandes->removeElement($commande);
            // set the owning side to null (unless already changed)
            if ($commande->getIdClient() === $this) {
                $commande->setIdClient(null);
            }
        }

        return $this;
    }
}
