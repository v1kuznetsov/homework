<?php
namespace App\Js\Repository;

use App\Js\Model\Product;
use App\Js\Exception\ProductAlreadyExsistException;

class ProductInMySQLRepository implements ProductRepositoryInterface
{
  public static function MySQL ()
  {
    return mysqli_connect ('localhost', 'admin', 'password', 'store');
  }

  public function addProduct(Product $product): void
  {
    $id = $product->getId();
    $name = $product->getName();
    $price = $product->getPrice();
    $season = $product->getSeason();

    $sql = "SELECT EXISTS(SELECT id FROM products WHERE name = '$name')";
    $result = mysqli_query(self::MySQL(), $sql);
    foreach ($result as $val)
    {
      foreach ($val as $check)
      {
        if ($check == 1)
        {
          throw new ProductAlreadyExsistException("Product already exist");
        }
        else
        {
          $sql = "INSERT INTO products VALUES ($id, '$name', $price, $season)";
          mysqli_query(self::MySQL(), $sql);
        }
      }
    }
  }

  public function findAllProducts(): array|string
  {
    $result = [];
    $sql = "SELECT * FROM products";
    $res = mysqli_query(self::MySQL(), $sql);
    foreach ($res as $val)
    {
      $result[$val['id']] = $val;
    }
    if ($result == NULL) {
      return false;
    }
    return $result;
  }

  public function updateProduct(Product $product): void
  {
    $id = $product->getId();
    $name = $product->getName();
    $price = $product->getPrice();
    $season = $product->getSeason();

    $sql = "UPDATE products SET name = '$name', price = $price, season = $season WHERE id = $id";

    mysqli_query(self::MySQL(), $sql);
  }

  public function deleteProduct(Product $product): void
  {
    $id = $product->getId();

    $sql = "DELETE FROM products WHERE id = $id";

    mysqli_query(self::MySQL(), $sql);
  }
}
