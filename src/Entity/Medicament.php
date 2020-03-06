<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MedicamentRepository")
 */
class Medicament
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
    private $dénomination;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $conditionnement;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\LignePrescription", mappedBy="dénomination", cascade={"persist"})
     */
    private $lignePrescriptions;

    public function __construct()
    {
        $this->lignePrescriptions = new ArrayCollection();
        $this->patients = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDénomination(): ?string
    {
        return $this->dénomination;
    }

    public function setDénomination(string $dénomination): self
    {
        $this->dénomination = $dénomination;

        return $this;
    }

    public function getConditionnement(): ?string
    {
        return $this->conditionnement;
    }

    public function setConditionnement(string $conditionnement): self
    {
        $this->conditionnement = $conditionnement;

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
            $lignePrescription->setDénomination($this);
        }

        return $this;
    }

    public function removeLignePrescription(LignePrescription $lignePrescription): self
    {
        if ($this->lignePrescriptions->contains($lignePrescription)) {
            $this->lignePrescriptions->removeElement($lignePrescription);
            // set the owning side to null (unless already changed)
            if ($lignePrescription->getDénomination() === $this) {
                $lignePrescription->setDénomination(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->dénomination;
    }
}
