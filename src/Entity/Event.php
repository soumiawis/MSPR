<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;



/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\EventRepository")
 */
class Event
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"get"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"get"})
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"get"})
     */
    private $description;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"get"})
     */
    private $dateDebut;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"get"})
     */
    private $dateFin;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Artist", inversedBy="events")
     */
    private $artist;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Lieu", inversedBy="events")
     * @ORM\JoinColumn(nullable=false)
     */
    private $lieux;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Categorie", inversedBy="events")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categorie;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

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

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    public function getArtist(): ?Artist
    {
        return $this->artist;
    }

    public function setArtist(?Artist $artist): self
    {
        $this->artist = $artist;

        return $this;
    }

    public function getLieux(): ?Lieu
    {
        return $this->lieux;
    }

    public function setLieux(?Lieu $lieux): self
    {
        $this->lieux = $lieux;

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function __toString()
    {
        return $this->nom;
    }
}
