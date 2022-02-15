<?php
  function divider ($num, $i) {
    if ($i < $num) {
      if ($num % $i == 0) {
        echo $i;
      }
    divider($num,  $i = $i + 1);
    }
  }

  divider(21, 1);
?>