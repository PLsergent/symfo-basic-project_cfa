<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LignePrescriptionRepository")
 */
class LignePrescription
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
    private $posologie;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Ordonnance", inversedBy="lignePrescriptions")
     */
    private $numeroOrdre;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Medicament", inversedBy="lignePrescriptions")
     */
    private $dénomination;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPosologie(): ?string
    {
        return $this->posologie;
    }

    public function setPosologie(string $posologie): self
    {
        $this->posologie = $posologie;

        return $this;
    }

    public function getNumeroOrdre(): ?Ordonnance
    {
        return $this->numeroOrdre;
    }

    public function setNumeroOrdre(?Ordonnance $numeroOrdre): self
    {
        $this->numeroOrdre = $numeroOrdre;

        return $this;
    }

    public function getDénomination(): ?Medicament
    {
        return $this->dénomination;
    }

    public function setDénomination(?Medicament $dénomination): self
    {
        $this->dénomination = $dénomination;

        return $this;
    }
}
