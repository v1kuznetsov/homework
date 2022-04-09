<?php
  $arr = [];
  $j = 0;
  for ($i = 0; $i < 18; $i++) {
    $arr[$i] = 2;
    $j++;
    if ($j == 3) {
      $arr[$i] = $arr[$i-1] + $arr[$i-2];
      $j = 0;
    }
  }
  var_dump($arr);
?>