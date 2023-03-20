<?php

namespace App\Entity;

use App\Repository\FruitRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FruitRepository::class)]
class Fruit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $family = null;

    #[ORM\Column(length: 255)]
    private ?string $genus = null;

    #[ORM\Column(length: 255)]
    private ?string $fruit_order = null;

    #[ORM\Column(nullable: true)]
    private ?int $fruity_vice_id = null;

    #[ORM\OneToOne(mappedBy: 'fruit', cascade: ['persist', 'remove'])]
    private ?Favourite $favourite = null;

    #[ORM\OneToOne(mappedBy: 'fruit', cascade: ['persist', 'remove'])]
    private ?Nutrition $nutrition = null;


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

    public function getFamily(): ?string
    {
        return $this->family;
    }

    public function setFamily(string $family): self
    {
        $this->family = $family;

        return $this;
    }

    public function getGenus(): ?string
    {
        return $this->genus;
    }

    public function setGenus(string $genus): self
    {
        $this->genus = $genus;

        return $this;
    }

    public function getFruitOrder(): ?string
    {
        return $this->fruit_order;
    }

    public function setFruitOrder(string $fruit_order): self
    {
        $this->fruit_order = $fruit_order;

        return $this;
    }

    public function getFruityViceId(): ?int
    {
        return $this->fruity_vice_id;
    }

    public function setFruityViceId(int $fruity_vice_id): self
    {
        $this->fruity_vice_id = $fruity_vice_id;

        return $this;
    }

    public function getFavourite(): ?Favourite
    {
        return $this->favourite;
    }

    public function setFavourite(Favourite $favourite): self
    {
        $this->favourite = $favourite;

        return $this;
    }

    public function getNutrition(): ?Nutrition
    {
        return $this->nutrition;
    }

    /**
     * @param Nutrition|null $nutrition
     */
    public function setNutrition(?Nutrition $nutrition): void
    {
        $this->nutrition = $nutrition;
    }
}
