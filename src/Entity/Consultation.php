<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ConsultationRepository")
 */
class Consultation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateHeure;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Patient", inversedBy="consultations")
     */
    private $numSS;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Medecin", inversedBy="consultations")
     */
    private $matricule;

    public function getId(): ?int
    {
        return $this->id;
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
}
