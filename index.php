<?php
use App\task_1\LongString;
include_once './vendor/autoload.php';

$test = new LongString("masterpeace");
echo $test->cutString();
      // <?php
      // $towns = ['Харьков', 'Винница', 'Алчевск', 'Киев', 'Луганск', 'Кропивницкий'];
      // $mytown = ($_POST["firsttown"]);
      // if ($mytown === null) {
      //   $mytown = ($_POST["town"]);
      // }
      // if (!in_array($mytown, $towns)) {
      //   echo "Ошибка, вернитесь обратно";
      //   return 'ERROR';
      // } elseif (mb_strtolower(mb_substr($_POST["town"], 0, 1)) !== mb_strtolower($lastCharForMe)) {
      //   echo 'Не та буква';
      //   echo mb_strtolower(mb_substr($_POST["town"], 0, 1));
      //   echo mb_strtolower($lastCharForMe);
      //   return 'ERROR';
      // }
      // $lastChar = mb_substr($mytown, -1, 1);
      // foreach ($towns as $val) {
      //   if (mb_strtolower($lastChar) == mb_strtolower(mb_substr($val, 0, 1))) {
      //     $respond = $val;
      //     break;
      //   }
      // }
      // $lastCharForMe = mb_substr($respond, -1, 1);
      // ?>
?>