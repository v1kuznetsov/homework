<?php
  function searchChar ($str, $char) {
    $lowerChar = strtolower($char);
    $upperChar = strtoupper($char);
    $str = str_split($str);
    foreach ($str as $var) {
      if ($var === $char || $var === $lowerChar || $var === $upperChar) {
        $var = strtoupper($var);
      }
    $res [] = $var;
    }
    // var_dump($res);
    return implode($res);
  }

  searchChar('HELLO', 'e');
?>