<?php

namespace App\Entity;

use App\Repository\FilmRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FilmRepository::class)
 */
class Film
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $resume;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $realisateur;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $commentaires;

    /**
     * @ORM\Column(type="integer")
     */
    private $duree;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Genre1;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Genre2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $bandeAnnonce;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getResume(): ?string
    {
        return $this->resume;
    }

    public function setResume(?string $resume): self
    {
        $this->resume = $resume;

        return $this;
    }

    public function getRealisateur(): ?string
    {
        return $this->realisateur;
    }

    public function setRealisateur(string $realisateur): self
    {
        $this->realisateur = $realisateur;

        return $this;
    }

    public function getCommentaires(): ?string
    {
        return $this->commentaires;
    }

    public function setCommentaires(?string $commentaires): self
    {
        $this->commentaires = $commentaires;

        return $this;
    }

    public function getDuree(): ?int
    {
        return $this->duree;
    }

    public function setDuree(int $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getGenre1(): ?string
    {
        return $this->Genre1;
    }

    public function setGenre1(string $Genre1): self
    {
        $this->Genre1 = $Genre1;

        return $this;
    }

    public function getGenre2(): ?string
    {
        return $this->Genre2;
    }

    public function setGenre2(string $Genre2): self
    {
        $this->Genre2 = $Genre2;

        return $this;
    }

    public function getBandeAnnonce(): ?string
    {
        return $this->bandeAnnonce;
    }

    public function setBandeAnnonce(?string $bandeAnnonce): self
    {
        $this->bandeAnnonce = $bandeAnnonce;

        return $this;
    }
}
