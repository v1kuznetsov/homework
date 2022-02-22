<?php
  function printArray($arr) {
    foreach ($arr as &$var) {
          if(is_array($var)) {
            printArray($var);
            // unset($var);
          } else {
              echo $var . PHP_EOL;
              // unset($var);
            }
    }
  }
  
  printArray([1, ["a", "B"], 2, 3, [["c", "d"], "d"]]);

?>