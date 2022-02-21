<?php
  $main = [
    "film" => ['SW-IV', 'SW-V', 'SW-VI', 'SW-III'],
    "places" => [120, 83, 97, 73],
    "scores" => ["5+", "4-", "4", "5"]
  ];
  sort($main["film"], SORT_STRING);
  rsort($main["places"], SORT_NUMERIC);
  krsort($main["scores"]);
  print_r($main);
?>