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
      $this->conditionT_70 = rand(1, 4);
    }
    else
    {
      throw new Exception('Wrong number');
    }
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

try
{
    $t_10 = new T_70($a = readline("(1 or 0)-> "));
    $t_10->changeCondition();
}
catch(Exception $e)
{
    echo "Exception: " . $e->getMessage() . PHP_EOL;
}
  
?>