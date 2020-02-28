<?php

namespace App\Entity;

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
}
