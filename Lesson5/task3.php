<?php
  function pyramid ($num, $char) {
    for ($i = 0; $i < $num; $i++) {
      $res .= $char;
      echo "$res PHP_EOL";
    }
  }

  pyramid(20, '#');
?>