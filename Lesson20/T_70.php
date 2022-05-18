<?php

class T_70
{
  private int $conditionT_70;
  private $int;

  public function __construct (int $int)
  {
    if (($int === 1 || $int === 0))
    {
      $this->int = $int;
      echo $this->conditionT_70 = rand(1, 4);
    }
    else
    {
      return false;
    }
  }

  public function changeCondition ()
  {
    if ($this->int === 1)
    {
      echo 'perfect' . PHP_EOL;
      if (!($this->conditionT_70 > 4))
      {
        echo $this->conditionT_70 += 1;
      }
    }
    else
    {
      echo 'bad' . PHP_EOL;
      if (!($this->conditionT_70 < 1))
      {
        echo $this->conditionT_70 -= 1;
      }
    }
  }
}
for($i = 0; $i < 20; $i++)
{
  $t_10 = new T_70($a = readline("junior errors ="));
  $t_10->changeCondition();
}
?>