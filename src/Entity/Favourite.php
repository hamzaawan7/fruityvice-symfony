<?php

namespace App\Entity;

use App\Repository\FavouriteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FavouriteRepository::class)]
class Favourite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(inversedBy: 'favourite')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Fruit $fruit = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFruit(): ?Fruit
    {
        return $this->fruit;
    }

    public function setFruit(Fruit $fruit): self
    {
        // set the owning side of the relation if necessary
        if ($fruit->getFavourite() !== $this) {
            $fruit->setFavourite($this);
        }

        $this->fruit = $fruit;

        return $this;
    }
}
