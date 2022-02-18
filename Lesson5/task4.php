<?php
  function strReverse ($str) {
    $str = str_split($str);
    for ($i = count($str) - 1; $i >= 0; $i--) {
      $rstr [] = $str [$i];
    }
    $rstr = implode($rstr);
    var_dump($rstr);
  }

  strReverse('ToStEr');
?>