<?php
require_once '../vendor/autoload.php';
  // require_once '/home/vlad/HomeWorks/vendor/autoload.php';
  use App\Js\Repository\ProductInMySQLRepository;

  $repository = new ProductInMySQLRepository();

  header('Content-Type: application/json');

  die(json_encode($repository->findAllProducts()));
?>