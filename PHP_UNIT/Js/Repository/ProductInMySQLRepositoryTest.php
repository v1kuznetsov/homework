<?php
namespace Test\PHP_UNIT\Js\Repository;

use PHPUnit\Framework\TestCase;
use App\Js\Model\Product;
use App\Js\Model\Price;
use App\Js\Exception\ProductAlreadyExsistException;
use App\Js\Repository\ProductInMySQLRepository;

class ProductInMySQLRepositoryTest extends TestCase
{
  public function testFindEmptyProducts()
  {
    $repository = new ProductInMySQLRepository();
    $this->assertCount(0, $repository->FindAllProducts());
  }

  public function testAddOneProduct()
  {
    $price = new Price(20);
    $product = $this->createMock(Product::class);
    $product->method('getId')
      ->willReturn(1);
    $product->method('getName')
      ->willReturn('apple');
    $product->method('getPrice')
      ->willReturn($price);
    $product->method('getSeason')
      ->willReturn(2);
    $repository = new ProductInMySQLRepository();
    // $this->expectException(ProductAlreadyExsistException::class);
    $repository->addProduct($product);

    $repository = new ProductInMySQLRepository();
    $this->assertCount(1, $repository->FindAllProducts());
  }
}
?>