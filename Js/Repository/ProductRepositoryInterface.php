<?php

namespace App\Js\Repository;

use App\Exception\ProductAlreadyExsistException;
use App\Js\Model\Product;

interface ProductRepositoryInterface
{
/**
 * @param Product $product
 *
 * @throws ProductAlreadyExsistException
 */
  public function addProduct(Product $product): void;

  public function findAllProducts();

/**
 * @param Product $product
 *
 * @throws ProductNotFoundException
 */
  public function updateProduct(Product $product): void;

/**
 * @param Product $product
 *
 * @throws ProductNotFoundException
 */
  public function deleteProduct(Product $product): void;
}
