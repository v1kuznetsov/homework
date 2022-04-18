<?php
  $host = 'localhost';
  $user = 'admin';
  $pass = 'password';
  $db_name = 'films';
  GLOBAL $link;
  $link = mysqli_connect($host, $user, $pass, $db_name);
  if (!$link) {
    echo('Error');
  } else {  $sql = "show tables";
      $result = mysqli_query($link, $sql);
      foreach ($result as $val) {
        foreach ($val as $var) {
          $sql1 = "select * from $var";
          $res = mysqli_query($link, $sql1);
          foreach ($res as $val1) {
            foreach ($val1 as $rval1) {
              echo $rval1 . "\t";
              if (@(strlen($rval1) < 8) && $val1['id'] != $rval1) {
                echo "\t";
              }
            }
            echo "\n";
          }
          echo "\n";
        }
      }
    }
?>
