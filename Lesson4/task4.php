<?php
  function divider ($num, $i) {
    if ($i < $num / 2) {
      if ($num % $i == 0) {
        echo $i . PHP_EOL;
      }
    divider($num,  $i += 1);
    }
  }

  divider(21, 1);
?>