<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;



/**
 * @ApiResource(
 *     itemOperations = {
 *         "get" = {
 *             "normalization_context" = {
 *                 "groups" = {"get"}
 *             }
 *         }
 *     },
 *     collectionOperations = {
 *         "get" = {
 *             "normalization_context" = {
 *                 "groups" = {"get"}
 *             }
 *          }
 *     }
 * )
 * @ORM\Entity(repositoryClass="App\Repository\CategorieRepository")
 */
class Categorie
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
     * @ORM\OneToMany(targetEntity="App\Entity\Event", mappedBy="categorie")
     * @Groups({"get"})
     */
    private $events;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Artist", mappedBy="catergories")
     */
    private $artists;

    public function __construct()
    {
        $this->events = new ArrayCollection();
        $this->artists = new ArrayCollection();
    }

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

    /**
     * @return Collection|Event[]
     */
    public function getEvents(): Collection
    {
        return $this->events;
    }

    public function addEvent(Event $event): self
    {
        if (!$this->events->contains($event)) {
            $this->events[] = $event;
            $event->setCategorie($this);
        }

        return $this;
    }

    public function removeEvent(Event $event): self
    {
        if ($this->events->contains($event)) {
            $this->events->removeElement($event);
            // set the owning side to null (unless already changed)
            if ($event->getCategorie() === $this) {
                $event->setCategorie(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Artist[]
     */
    public function getArtists(): Collection
    {
        return $this->artists;
    }

    public function addArtist(Artist $artist): self
    {
        if (!$this->artists->contains($artist)) {
            $this->artists[] = $artist;
            $artist->addCatergorie($this);
        }

        return $this;
    }

    public function removeArtist(Artist $artist): self
    {
        if ($this->artists->contains($artist)) {
            $this->artists->removeElement($artist);
            $artist->removeCatergorie($this);
        }

        return $this;
    }


    public function __toString()
    {
        return $this->nom;
    }
}
