<?php
  function findInArray ($arr, $char) {
    foreach ($arr as $key => $val) {
      if (is_array($val)) {
        foreach ($val as $k => $v) {
          if ($char == $v) {
            return $k;
           }
        }
      } 
      else {
        if ($char == $val) {
          return $key;
        }
      }
    }
    return false;
  }

  findInArray([ 1, ["5", "B"], 2, 3 ], 6);
?>