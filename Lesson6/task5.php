<?php
  function findInArray ($arr, $char) {
    foreach ($arr as $key => $val) {
      if ($val === $char) {
        return $key;
      }
      else {
        if (is_array($val)) {
          findInArray($val, $char);
        }
      }
    }
    return false;
  }

  findInArray([ 1, [ 5, "B"], 2, 3 ], 5);
?>