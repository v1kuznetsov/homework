<?php
  $num = rand(1,51);
  echo "$num <br/>";
  if ($num > 0 && $num < 6) {
    echo 'Odd';
  }
  else {
    switch ($num) {
      case 10:
      case 20:
      case 30:
      case 40:
      case 50:
        echo "Even";
        break;
      default:
        echo "Ooops";
        break;
    }
  }
?>