<?php
class myskul
{
  public static function MySQL ()
  {
    return $connection = new PDO ('mysql:host=localhost;dbname=store;charset=utf8', 'admin', 'password');
  }
  
  public function findAllProducts(): array
  {
    $result = [];
    $connection = new PDO ('mysql:host=localhost;dbname=store;charset=utf8', 'admin', 'password');
    $res = $connection->query("SELECT * FROM products");
    foreach ($res as $val)
    {
      $result[$val['id']] = ['id' => $val['id'], 'name' => $val['name'], 'price' => $val['price'], 'season' => $val['season']];
    }
      return $result;
  }
}

$rep = new myskul();
var_dump($rep->findAllProducts());
?>