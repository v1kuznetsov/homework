<?php
  function fullFolder ($folder) {
    global $res1;
    if ($fp = opendir($folder)) {
      while (false !== ($entry = readdir($fp))) {
        if ($entry != "." && $entry != "..") {
          $res = &$folder;
          if (is_dir($res . $entry .'/')) {
            $res1++;
            echo "d $entry\v";
            fullFolder($res . $entry . '/');
          } else {
            echo "\r";
            if ($res1 > 0) {
              for ($i = 0; $i <= $res1; $i++)
                if ($i != $res1) {
                  echo "\t";
                } else {
                  echo "f $entry\n";
                  break;
                }
            } else {
              echo "f $entry\n";
            }
            }
        }
        
      }
      $res1 = 0;
      closedir($fp);
    }
  } 

  fullFolder("/home/vlad/HomeWorks/Lesson7/07/");
?>