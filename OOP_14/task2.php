<?php

class Square
{
  protected $a;
  public function __construct(int $a)
  {
    $this->a = $a;
  }
}
//#########################################################
class Rectangle
{
  protected $a;
  protected $b;
  public function __construct(int $a, int $b)
  {
    $this->a = $a;
    $this->b = $b;
  }
}
//#########################################################
class FigureRectangle extends Rectangle
{
  public function getPreimeter(): int|string
  {
    return 'Периметр прямоугольника равен:' . 2 * ($this->a + $this->b);
  }
  public function getArea(): int|string
  {
    return 'Площадь прямоугольника равна:' . $this->a * $this->b;
  }
}
//########################################################
class FigureSquare extends Square
{
  public function getPerimetr(): int|string
  {
    return 'Периметр квадрата равен:' . $this->a * 4;
  }
  public function getArea(): int|string
  {
    return 'Площадь квадрата равна:' . $this->a * $this->a;
  }
}

$squ = new FigureSquare(5);
echo $squ->getArea() . "\n";
echo $squ->getPerimetr() . "\n";
$rec = new FigureRectangle(1, 2);
echo $rec->getArea() . "\n";
echo $rec->getPreimeter() . "\n";
