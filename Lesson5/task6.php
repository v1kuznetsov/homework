<?php
  function twinStr ($string1, $string2) {
    $string1 = str_split ($string1);
    $string2 = str_split ($string2);
    $i = 0;
    // for ($i = 0; $i <= count($string1); $i++) {
    //   if ($string1 [$i] === $string2 [$i]) {
    //     $sum += 1;
    //   }
    // }

    foreach ($string1 as $val) {
      if ($string2 [$i] === $val) {
        $sum++;
      }
      $i++;
    }
    var_dump($sum);
    $res = ($sum / count($string1)) * 100;
    var_dump($res);
  }

  twinStr('qwertyyyy', 'hwerty');
?>