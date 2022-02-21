<?php
  function printArray($arr) {
    foreach ($arr as $var) {
          if(is_array($var)) {
            foreach ($var as $v) {
              echo "$v \n";
            }
          } else {
          echo $var . PHP_EOL;
            }
    }
  }
  
  printArray(['fhgjkhfjkvghk' => ["a", "B"], 2, 3]);

?>