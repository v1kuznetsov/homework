<?php
  function scoreSort ($src, $dir) {
    $file = file_get_contents("$src");
    $file = explode("\n", $file, -1);
  foreach ($file as $key => $val) {
    $var = explode(',', $val);
    $main [$var[0]] = $var;
    unset($main[$var[0]][0]);
  }
//
function retake ($arr) {
  return $arr < 3;
}
//
    $two = 0;
    $three = 0;
    $four = 0;
    $five = 0;
  foreach ($main as $name => $val) {
    foreach ($val as &$num) {
      switch ($num) {
        case 1:
        case 2:
          @$two++;
          break;
        case 3:
          @$three++;
          break;
        case 4:
          @$four++;
          break;
        case 5:
          @$five++;
          break;
        }
  }
  $arr = ['Math', 'Hist', 'Eng'];
  $result = array_combine($arr, $val);
    if ($two >= 1) {
      $resultf = array_filter($result, "retake");
      file_put_contents("$dir" . "retake.csv", $name . "\t", FILE_APPEND);
      foreach ($resultf as $key => $score) {
      file_put_contents("$dir" . "retake.csv",$key . "\t" . $score . "\t", FILE_APPEND);
      }
      file_put_contents("$dir" . "retake.csv","\n", FILE_APPEND);
    }
    elseif ($five == 3) {
      file_put_contents("$dir" . "exelent.csv", $name."\n");
    }
    elseif ($three >= 1) {
      file_put_contents("$dir" . "bad.csv", $name . "\t", FILE_APPEND);
      foreach ($result as $key => $score) {
        file_put_contents("$dir" . "bad.csv", $key . "\t" . $score . "\t", FILE_APPEND);
      }
      file_put_contents("$dir" . "bad.csv", "\n", FILE_APPEND);
    }
    elseif ($three == 0 && $four > 0 || $five > 0) {
      file_put_contents("$dir" . "good.csv", $name . "\t", FILE_APPEND);
      foreach ($result as $key => $score) {
        file_put_contents("$dir" . "good.csv", $key . "\t" . $score . "\t", FILE_APPEND);
      }
      file_put_contents("$dir" . "good.csv", "\n", FILE_APPEND);
    }
  $two = 0;
  $three = 0;
  $four = 0;
  $five = 0;
  }
}
  
  scoreSort("/home/vlad/HomeWorks/Lesson7_2/src/src.csv","/home/vlad/HomeWorks/Lesson7_2/res/");

?>