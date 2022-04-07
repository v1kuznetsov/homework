<?php
  function getUniqueArray ($arr) {
    $resArr = [];
    foreach ($arr as $val) {
        if (!in_array($val, $resArr)) {
          $resArr [] = $val;
      }
    }
    return($resArr);
  }
  $array = [1,1,1,5,5,3,7,8,8,8,8,8,8,8,8,8,8,8,8,8];
  var_dump(getUniqueArray($array));
?>