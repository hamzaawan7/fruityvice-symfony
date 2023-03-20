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

    #[ORM\Column]
    private ?int $fruit_id = null;

    #[ORM\Column(nullable: true)]
    private ?bool $is_favourite = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFruitId(): ?int
    {
        return $this->fruit_id;
    }

    public function setFruitId(int $fruit_id): self
    {
        $this->fruit_id = $fruit_id;

        return $this;
    }

    public function isIsFavourite(): ?bool
    {
        return $this->is_favourite;
    }

    public function setIsFavourite(?bool $is_favourite): self
    {
        $this->is_favourite = $is_favourite;

        return $this;
    }
}
