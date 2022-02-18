<?php
  function bestPassword($pas) {
    $upperLetter = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U' ,'V' ,'W', 'X', 'Y', 'Z'];
    $nums = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
    $sChars = ['!', '@', '$', '%', '^', '&', '*', '(', ')', '_', '-', '+', '=', '#'];
    // НЕ ПОЙМУ ПОЧЕМУ ФУНКЦИЯ in_array ПРИ СРАВНЕНИИ ДВУХ МАССИВОВ ВСЕГДА ВЫДАЕТ false
    $pas = str_split($pas);
    $up = in_array($upperLetter, $pas);
    $nu = in_array($num, $pas);
    $sc = in_array($sChars, $pas);
    var_dump ($upperLetter);

    if (count($pas) >= 8 && $up == true && $nu == true && $sc == true) {
      echo 'Сложный пароль';
    }
    elseif (count($pas) <= 8 && $up == true && $nu == true) {
      echo 'Средний пароль';
    }
    elseif (count($pas) <= 8) {
      echo 'Простой пароль';
    }
  }

  bestPassword('1234A5667');
?>