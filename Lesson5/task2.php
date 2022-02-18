<?php
  function outputChar($str, $char) {
    $lowerchar = strtolower($char);
    $upperChar = strtoupper($char);
    if (str_contains($str, $lowerchar)) {
      for ($i = 0; $i < strlen($str); $i++) {
        var_dump($char);
      }
    }
    elseif (str_contains($str, $upperChar)) {
      for ($i = 0; $i < strlen($str); $i++) {
        var_dump($char);
    }
    } else {
      var_dump('Такого символа нет в строке');
    }
  }

  outputChar('hello', 'e');
?>