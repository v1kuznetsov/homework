<?php
  function findInArray ($arr, $char) {
    foreach ($arr as $key => $val) {
      if (is_array($val)) {
        foreach ($val as $k => $v) {
          if ($char == $v) {
            echo "Array name: $key" . PHP_EOL;
            echo "Key is: $k";
            return $k;
           }
        }
      } 
      else {
        if ($char == $val) {
          echo "Key is: $key" . PHP_EOL;
          return $key;
        }
      }
    }
    echo 'false';
    return false;
  }

  findInArray([ 1 => ["5", "B"], "str" => 2, 3], 6);
?>