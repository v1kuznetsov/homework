<?php
  function weeks ($weekNumber) {
    switch ($weekNumber) {
      case 1:
        $weekNumber = "Monday";
        return $weekNumber;
      case 2:
        $weekNumber = "Tuesday";
        return $weekNumber;
      case 3:
        $weekNumber = "Wednesday";
        return $weekNumber;
      case 4:
        $weekNumber = "Thursday";
        return $weekNumber;
      case 5:
        $weekNumber = "Friday";
        return $weekNumber;
      case 6:
        $weekNumber = "Saturday";
        return $weekNumber;
      case 7:
        $weekNumber = "Sunday";
        return $weekNumber;
      default:
        echo "Error";
    }
  }

  // weeks (rand(1,10));
?>