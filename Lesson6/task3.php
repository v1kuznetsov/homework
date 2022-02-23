<?php
  function printArray($arr) {
    foreach ($arr as &$var) {
          if(is_array($var)) {
            printArray($var);
          } else {
              echo $var . PHP_EOL;
            }
    }
  }
  
  printArray([1, ["a", "B"], 2, 3, [["c", "d"], "d"]]);

?>