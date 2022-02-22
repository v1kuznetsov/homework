<?php
  function twinStr ($string1, $string2) {
    $string1 = str_split ($string1);
    $string2 = str_split ($string2);
    $i = 0;
    $sum = 0;
    foreach ($string1 as $val) {
      if ($string2 [$i] === $val) {
        $sum++;
      }
      $i++;
    }
    $res = ($sum / count($string1)) * 100;
    echo($res . "%");
  }

  twinStr('qwerty', 'hwerty');
?>