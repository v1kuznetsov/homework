<?php
  $a = 1;
  $b = 2;
  $c = 3;
  $max;
  $min;
  $arr = [$a, $b, $c];
  if ($a === $b && $b === $c) {
    echo "Все числа равны: $a";
  } else {
    foreach ($arr as $val) {
      if ($val > $max || $max === null) {
        $max = $val;
      }
      if ($val < $min || $min === null) {
        $min = $val;
      }
    }
  }
  echo "$max \n";
  echo "$min \n";
?>