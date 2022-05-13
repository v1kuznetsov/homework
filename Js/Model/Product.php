<?php

namespace App\Js\Model;

class Product
{
  private int $id;

  private string $name;

  private Price $price;

  private int $season;

  public function __construct(int $id, string $name, Price $price, int $season)
  {
    $this->id = $id;
    $this->name = $name;
    $this->price = $price;
    $this->season = $season;
  }

  public function getId(): int
  {
    return $this->id;
  }

  public function getName(): string
  {
    return $this->name;
  }

  public function getPrice(): Price
  {
    return $this->price;
  }

  public function getSeason(): int
  {
    return $this->season;
  }

  public function toArray()
  {
    return [
      'id' => $this->id,
      'name' => $this->name,
      'price' => (string) $this->price,
      'season' => $this->season
    ];
  }
}
