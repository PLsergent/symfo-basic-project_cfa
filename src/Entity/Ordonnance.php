<?php

namespace App\Entity;

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
}
