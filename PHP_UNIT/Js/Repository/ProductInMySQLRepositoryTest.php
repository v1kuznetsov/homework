<?php
namespace Test\PHP_UNIT\Js\Repository;

use PHPUnit\Framework\TestCase;
use App\Js\Model\Product;
use App\Js\Model\Price;
use App\Js\Exception\ProductAlreadyExsistException;
use App\Js\Repository\ProductInMySQLRepository;

class ProductInMySQLRepositoryTest extends TestCase
{
  public function setUp(): void
  {
    $price = new Price(20);
    $product = $this->createMock(Product::class);
    $this->product = new Product(1, 'apple', $price, 2);
  }

  public function testAddUpDelProduct()
  {
    $repository = $this->createMock(ProductInMySQLRepository::class);

    $repository->addProduct($this->product);

    $repository->updateProduct($this->product);

    $repository->deleteProduct($this->product);

    $this->assertCount(0, $repository->findAllProducts());
  }

  public function testEmptyRopository()
  {
    $repository = $this->createMock(ProductInMySQLRepository::class);
    $this->assertCount(0, $repository->findAllProducts());
  }
}
?>