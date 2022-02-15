<?php
function simpleNum ($num) {
    for ($i = $num - 1; $i > 1; $i--) {
      if ($num % $i == 0) {
        echo "0";
        return false;
      }
    }
    echo "1";
    return true;
  }

  // simpleNum(5);
?>
