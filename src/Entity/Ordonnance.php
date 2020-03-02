<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OrdonnanceRepository")
 */
class Ordonnance
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numeroOrdre;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateHeure;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Patient", inversedBy="ordonnances")
     */
    private $numSS;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Medecin", inversedBy="ordonnances")
     */
    private $matricule;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\LignePrescription", mappedBy="numeroOrdre")
     */
    private $lignePrescriptions;

    public function __construct()
    {
        $this->lignePrescriptions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroOrdre(): ?string
    {
        return $this->numeroOrdre;
    }

    public function setNumeroOrdre(string $numeroOrdre): self
    {
        $this->numeroOrdre = $numeroOrdre;

        return $this;
    }

    public function getDateHeure(): ?\DateTimeInterface
    {
        return $this->dateHeure;
    }

    public function setDateHeure(\DateTimeInterface $dateHeure): self
    {
        $this->dateHeure = $dateHeure;

        return $this;
    }

    public function getNumSS(): ?Patient
    {
        return $this->numSS;
    }

    public function setNumSS(?Patient $numSS): self
    {
        $this->numSS = $numSS;

        return $this;
    }

    public function getMatricule(): ?Medecin
    {
        return $this->matricule;
    }

    public function setMatricule(?Medecin $matricule): self
    {
        $this->matricule = $matricule;

        return $this;
    }

    /**
     * @return Collection|LignePrescription[]
     */
    public function getLignePrescriptions(): Collection
    {
        return $this->lignePrescriptions;
    }

    public function addLignePrescription(LignePrescription $lignePrescription): self
    {
        if (!$this->lignePrescriptions->contains($lignePrescription)) {
            $this->lignePrescriptions[] = $lignePrescription;
            $lignePrescription->setNumeroOrdre($this);
        }

        return $this;
    }

    public function removeLignePrescription(LignePrescription $lignePrescription): self
    {
        if ($this->lignePrescriptions->contains($lignePrescription)) {
            $this->lignePrescriptions->removeElement($lignePrescription);
            // set the owning side to null (unless already changed)
            if ($lignePrescription->getNumeroOrdre() === $this) {
                $lignePrescription->setNumeroOrdre(null);
            }
        }

        return $this;
    }
}
