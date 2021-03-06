<?php
  class Price
  {
    private $coin;
    public function __construct(int $coin)
    {
      $this->coin = $coin;
    }
  }

  class Product
  {
    private string $name;
    private Price $price;
    public function __construct(string $name, Price $price)
    {
      $this->name = $name;
      $this->price = $price;
    }
    public function getName() 
    {
      return $this->name;
    }
    public function getPrice()
    {
      return $this->price;
    }
  }
  class Repository 
  {
    private array $products;
    public function __construct () 
    {
      $this->products = [];
    }
    public function addProduct (Product $product) 
    {
      $val = $product->getName();
      $this->products[strtolower($val)] = $product;
    }
    public function findProduct($nameProduct)
    {
      return $this->products[strtolower($nameProduct)];
    }

  }
  $price = new Price (100);
  $product = new Product ("Apple", $price);
  $repository = new Repository();
  $repository->addProduct($product);
  var_dump($repository->findProduct("APPle"));
?>