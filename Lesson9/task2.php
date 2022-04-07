<?php
  $arr = [];
  for ($i = 0; $i < 18; $i++) {
    $arr [$i] = rand(0, 3);
  }
  $j = 0;
  for ($i = 0; $i < count($arr); $i++) {
    if ($j == 3) {
      $arr[$i] = $arr[$i-1] + $arr[$i-2];
      $j = 0;
    }
    $j++;
  }
  var_dump($arr);
?>