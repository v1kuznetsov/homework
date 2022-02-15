<?php
  function divider ($num) {
    for ($i = $num; $i > 0; $i--) {
      if ($num % $i == 0) {
        $arr[] = $i;
      }
    }
    var_dump($arr);
    return $arr;
  }

  divider(21);
?>