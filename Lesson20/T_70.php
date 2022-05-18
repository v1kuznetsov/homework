<?php

class T_70
{
  private int $conditionT_70;
  private $int;

  public function __construct ()
  {
    $this->int = rand(0, 1);
    $this->conditionT_70 = rand(1, 4);
  }

  public function changeCondition ()
  {
    if ($this->int === 1)
    {
      echo 'perfect' . PHP_EOL;
      if (!($this->conditionT_70 > 4))
      {
        $this->conditionT_70 += 1;
      }
    }
    else
    {
      echo 'bad' . PHP_EOL;
      if (!($this->conditionT_70 < 1))
      {
        $this->conditionT_70 -= 1;
      }
    }
  }
}

$t_10 = new T_70();

$t_10->changeCondition();

?>