<?php

namespace App\Js\Repository;

use App\Js\Model\Product;
use App\Js\Exception\ProductAlreadyExsistException;

class ProductInMemoryRepository implements ProductRepositoryInterface
{
  /**
   * @var Product[]
   */
  private array $products;

  public function __construct()
  {
    $this->products = [];
  }

  public function addProduct(Product $product): void
  {
    if (array_key_exists($product->getId(), $this->products)) {
      // error - already exist in storage
      throw new ProductAlreadyExsistException('Product already exist');
    }

    $this->products[$product->getId()] = $product;
  }

  /**
   * @return array|Product[]
   */
  public function findAllProducts(): array
  {
    return $this->products;
  }

  public function updateProduct(Product $product): void
  {
    $this->products[$product->getId()] = $product;
  }

  public function deleteProduct(Product $product): void
  {
    unset($this->products[$product->getId()]);
  }
}
