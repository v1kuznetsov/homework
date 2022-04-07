<?php
  function deleteElement (array $arr, string $char): array {
    foreach ($arr as $key => $val) {
      if ($val === $char) {
        unset($arr[$key]);
      }
    }
    return $arr;
  }
  $array = [1, 2, 4, 'h', 'a', 6, 'g', 'h', 'h', 'h', 'h', 'j'];
  $char = 'h';
  var_dump(deleteElement($array, $char));
?>