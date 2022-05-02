<?php
  abstract class Values {
    protected $a;
    protected $b;
    public function __construct (int|float $a, int|float $b) {
      $this->a = $a;
      $this->b = $b;
    }
  }
  class Operations extends Values {
    function plus (): int|float|string
    {
      return "$this->a + $this->b = " . $this->a + $this->b;
    }
    function minus (): int|float|string
    {
      return "$this->a - $this->b = " . $this->a - $this->b;
    }
    function divide(): int|float|string
    {
      return "$this->a / $this->b = " . $this->a / $this->b;
    }
    function multiply(): int|float|string
    {
      return "$this->a * $this->b = " . $this->a * $this->b;
    }
    function divideWithRem(): int|float|string
    {
      return "$this->a % $this->b = " . $this->a % $this->b;
    }
    function absVal(): int|float|string
    {
      if ($this->a < 0) {
        return "|$this->a| = " . $this->a * -1;
      } else {
        return "|$this->a| = " . $this->a;
      }
      // return abs($this->a);
    }
 }

  $first = new Operations(-20, 3);
  echo $first->multiply() . "\n";
  echo $first->plus() . "\n";
  echo $first->minus() . "\n";
  echo $first->divide() . "\n";
  echo $first->divideWithRem() . "\n";
  echo $first->absVal();
?>