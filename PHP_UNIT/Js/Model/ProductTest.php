<?php
namespace Test\PHP_UNIT\Js\Model;

use App\Js\Model\Price;
use App\Js\Model\Product;
use PHPunit\Framework\TestCase;

class ProductTest extends TestCase
{
  private Product $product;
  private Price $price;

  public function setUp(): void
  {
    $price = $this->createMock(Price::class);
    $price->method('createFromString')
      ->willReturn(20);
    $this->price = new Price(20);
  }

  public function testGetId()
  {
    $price = new Price(20);
    $test = new Product(1, 'apple', $price, 2);
    $this->assertEquals(1, $test->getId());
  }

  public function testGetName()
  {
    $price = new Price(20);
    $test = new Product(1, 'apple', $price, 2);
    $this->assertEquals('apple', $test->getName());
  }

  public function testGetPrice()
  {
    $price = new Price(2000);
    $test = new Product(1, 'apple', $price, 2);
    $this->assertEquals(Price::createFromString(20), $test->getPrice());
  }

  public function testGetSeason()
  {
    $price = new Price(20);
    $test = new Product(1, 'apple', $price, 2);
    $this->assertEquals(2, $test->getSeason());
  }
}
?>