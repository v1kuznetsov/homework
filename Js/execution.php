<?php
require_once '../vendor/autoload.php';

use App\Js\Model\Price;
use App\Js\Model\Product;
use App\Js\Repository\ProductInMySQLRepository;
use App\Js\Exception\ProductAlreadyExsistException;

$inputJSON = file_get_contents('php://input');
$data = json_decode($inputJSON, true);

$price = Price::createFromString($data['price']);
$product = new Product($data ['id'], $data ['name'], $price, $data ['season']);

try
{
  $repository = new ProductInMySQLRepository();
  $repository->addProduct($product);
}
catch (ProductAlreadyExsistException $e)
{
  echo "ProductAlreadyExsistException: " . $e->getMessage();
}
catch (Exception $last)
{
  echo "Exception: " . $last->getMessage();
}

?>