<?php

namespace App\Entity;

use App\Entity\Traits\Timestampable;
use App\Repository\CarRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CarRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Car
{
    use Timestampable;
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $carName = null;

    #[ORM\Column]
    private ?int $nbOfPlaces = null;

    #[ORM\Column(length: 255)]
    private ?string $speed = null;

    #[ORM\Column(length: 255)]
    private ?string $fuelType = null;

    #[ORM\Column]
    private ?int $nbCarDoors = null;

    #[ORM\Column]
    private ?float $price = null;

    #[ORM\Column]
    private ?int $yearOfConstruction = null;

    #[ORM\ManyToOne(inversedBy: 'cars')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Category $category = null;

    #[ORM\ManyToOne(inversedBy: 'cars')]
    #[ORM\JoinColumn(nullable: false)]
    private ?BrandOfCar $brand = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $urlImage = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCarName(): ?string
    {
        return $this->carName;
    }

    public function setCarName(string $carName): static
    {
        $this->carName = $carName;

        return $this;
    }

    public function getNbOfPlaces(): ?int
    {
        return $this->nbOfPlaces;
    }

    public function setNbOfPlaces(int $nbOfPlaces): static
    {
        $this->nbOfPlaces = $nbOfPlaces;

        return $this;
    }

    public function getSpeed(): ?string
    {
        return $this->speed;
    }

    public function setSpeed(string $speed): static
    {
        $this->speed = $speed;

        return $this;
    }

    public function getFuelType(): ?string
    {
        return $this->fuelType;
    }

    public function setFuelType(string $fuelType): static
    {
        $this->fuelType = $fuelType;

        return $this;
    }

    public function getNbCarDoors(): ?int
    {
        return $this->nbCarDoors;
    }

    public function setNbCarDoors(int $nbCarDoors): static
    {
        $this->nbCarDoors = $nbCarDoors;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getYearOfConstruction(): ?int
    {
        return $this->yearOfConstruction;
    }

    public function setYearOfConstruction(int $yearOfConstruction): static
    {
        $this->yearOfConstruction = $yearOfConstruction;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): static
    {
        $this->category = $category;

        return $this;
    }

    public function getBrand(): ?BrandOfCar
    {
        return $this->brand;
    }

    public function setBrand(?BrandOfCar $brand): static
    {
        $this->brand = $brand;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getUrlImage(): ?string
    {
        return $this->urlImage;
    }

    public function setUrlImage(string $urlImage): static
    {
        $this->urlImage = $urlImage;

        return $this;
    }
}
