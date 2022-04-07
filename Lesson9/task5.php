<?php
  function sliceArray (array $arr, int $separator) {
    $i = 0;
    $transit = [];
    foreach ($arr as $val) {
      $i++;
      $transit [] = $val;
      if ($i === $separator) {
        $result [] = $transit;
        $transit = [];
        $i = 0;
      }
    }
    return $result;
  }
  $array = [1,2,3,4,4,5,6,7,8,9,9,0];
  var_dump(sliceArray($array, 2));
?>