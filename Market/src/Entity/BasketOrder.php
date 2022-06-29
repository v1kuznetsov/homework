<?php

namespace App\Entity;

use App\Repository\BasketOrderRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BasketOrderRepository::class)]
class BasketOrder
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\OneToOne(inversedBy: 'basketOrder', targetEntity: ProductsInBasket::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private $products;

    #[ORM\ManyToOne(targetEntity: City::class)]
    private $city;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $address;

    #[ORM\ManyToOne(targetEntity: Status::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $status;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2)]
    private $order_total_price;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProducts(): ?ProductsInBasket
    {
        return $this->products;
    }

    public function setProducts(ProductsInBasket $products): self
    {
        $this->products = $products;

        return $this;
    }

    public function getCity(): ?City
    {
        return $this->city;
    }

    public function setCity(?City $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getStatus(): ?Status
    {
        return $this->status;
    }

    public function setStatus(?Status $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getOrderTotalPrice(): ?string
    {
        return $this->order_total_price;
    }

    public function setOrderTotalPrice(string $order_total_price): self
    {
        $this->order_total_price = $order_total_price;

        return $this;
    }
}
