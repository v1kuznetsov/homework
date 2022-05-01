<?php
  function findInArray ($arr, $char) {
    global $res;
    global $loop;
    $loop = 0;

    foreach ($arr as $key => $val) {
    if ($loop >= 0){        
      if (is_array($val)) {
        $loop++;
        $res [] = $key;
        findInArray($val, $char);        
      }
      else {
            if ($val === $char) {
              $res[] = $key;
              // if (count($res) > $loop += 1) {
              //   for ($i = count($res); $i > $loop; $i--) {
              //     unset($res[count($res) - 2]);
              //   }
              // }
              $loop = -1;
              var_dump($res);
              return $res;
            }
          }
        } 
        else {
          break;
        }
    }
  } 

  findInArray([ 1, [ [4,4,[4,5]], "B"], [1, 5], 4, 5], 5);
?>