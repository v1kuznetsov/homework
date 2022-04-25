<?php
  class Price
  {
    private $coin;
    public function __construct(int $coin)
    {
      $this->coin = $coin;
    }
    public function __toString(): string
    {
      return (string)$this->coin / 100;
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

/*
Немного взял из последней лекции, очень трудная тема(не судите строго х( )
PS Но идею понял хотя есть вопросики, но думаю до след лекции я и сам на них отвечу.*/
?>