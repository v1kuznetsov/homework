<?php
  namespace App\task_1;
  
  class LongString
  {
    private string $longString;

    public function __construct(string $longString)
    {
      $this->longString = $longString;
    }

    public function cutString(): string {
      $array = explode(" ", $this->longString);
      foreach ($array as $val) {
        if (mb_strlen($val) > 6) {
          $val = mb_strimwidth($val, 0, 7, '*');
        }
        $result[] = $val;
      }
      return implode(" ", $result) . PHP_EOL;
    }
  }

  $string = new LongString("я купив бронетранспортер  учора");
  echo $string->cutString();
?>