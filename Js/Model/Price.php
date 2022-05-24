<?php

namespace App\Js\Model;

class Price
{
  /**
   * @var int 100 coins = 1 UAH
   */
  private int $coins;

  public function __construct(int $coins)
  {
    $this->coins = $coins;
  }

  public function createFromString(string $price)
  {
    return ($price * 100);
  }

  public function __toString(): string
  {
    return (string) $this->coins / 100;
  }
}
