<?php
namespace App\PHP_UNIT\task1;

class Task1
{
  private int $int;
  private array $arr;
  public function __construct(int $int, array $arr)
  {
    $this->int = $int;
    $this->arr = $arr;
  }
  public function firstTask(): array
  {
    $arr = $this->arr;
    $int = $this->int;
    $res = [];
    foreach($arr as $val)
    {
      $val = $val * $int;
      $res[] = $val;
    }
    return $res;
  }

  public function secondTask(): int
  {
    $sum = 0;
    $int = $this->int;
    while ($int / 10)
    {
      $sum += $int % 10;
      $int /= 10;
    }
    return $sum;
  }

  public function thirtTask(): int
  {
    $array = $this->arr;
    $sum = function ($res, $num)
    {
      $res += $num;
      return $res;
    };
    return array_reduce($array, $sum);
  }

  public function fouthTask()
  {
    $arr = $this->arr;
    $int = $this->int;
    $res = [];
    foreach ($arr as $val)
    {
      if ($val > $int)
      {
        $res[] = $val;
      }
    }
    return $res;
  }
}

$test = new Task1(2, [1,2,3]);
var_dump($test->fouthTask());
?>