<?php
  function biggestNumber ($a, $b, $c) {
    if ($a == $b && $b == $c) {
      return $a;
    }
    return max ($a, $b, $c);
  }

  // biggestNumber(4, 4, 4);
  ?>