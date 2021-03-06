<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\GalaxiesRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Controller\Api\GalaxySelected;
use App\Controller\Api\GalaxyLast;

/**
 * @ApiResource(
 *     collectionOperations={
 *      "get"={},
 *      "post"={},
 *      "last_galaxy"={
 *          "method"="GET",
 *          "path"="/galaxy/last",
 *          "controller"=GalaxyLast::class
 *      }
 *     },
 *     itemOperations={
 *      "get"={},
 *      "put"={},
 *      "delete"={},
 *      "selected_galaxy"={
 *          "method"="GET",
 *          "path"="/galaxy/{id}/last",
 *          "controller"=GalaxySelected::class
 *      }
 *     }
 * )
 * @ORM\Entity(repositoryClass=GalaxiesRepository::class)
 */
class Galaxies
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created;

    public function __construct()
    {
        $this->created = new \DateTime();
    }

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCreated(): ?\DateTimeInterface
    {
        return $this->created;
    }

    public function setCreated(\DateTimeInterface $created): self
    {
        $this->created = $created;

        return $this;
    }
}
