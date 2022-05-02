<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <link href="style.css" rel="stylesheet">
  <title>Города</title>
</head>

<body>
  <div class="main">
    <p>Города игра</p>
    <form action="/form.php" method="POST">
      <?php
        $host = 'localhost';
        $user = 'admin';
        $pass = 'password';
        $db_name = 'towns';
        $db = new mysqli($host, $user, $pass, $db_name);
        if ($db->connect_error) {
          echo "Нет подключения к БД. Ошибка:" . mysqli_connect_error();
          exit;
        }

        $mytown = ($_POST["town"]);
          $sql = "SELECT EXISTS(SELECT id FROM existtowns WHERE name = '$mytown')";
          $result = mysqli_query($db, $sql);
          foreach ($result as $val) {
            foreach ($val as $check) {
              if ($check == 1) {
                echo "Город уже был";
                return false;
              }
            }
          }

          $sql = "INSERT INTO existtowns (name) VALUES ('$mytown')";
          mysqli_query($db, $sql);

        class FunctionsForGame {
          private $mytown;
          private $db;
          public function __construct($mytown , $db)
          {
            $this->mytown = $mytown;
            $this->db = $db;
          }
          public function getLastChar () 
          {
            return mb_substr($this->mytown, -1, 1); 
          }
          public function getRespond () 
          {
            $lastchar = mb_strtoupper($this->getLastChar());
            $sql = "SELECT name FROM townsingame";
            $result = mysqli_query($this->db, $sql);
            foreach ($result as $val)
            {
              foreach ($val as $town) 
              {
                if ($lastchar == mb_substr($town, 0, 1)){
                  // $sql = "SELECT EXISTS(SELECT id FROM existtowns WHERE name = '$town')";
                  // $result = mysqli_query($this->db, $sql);
                  // foreach ($result as $val) {
                  //   var_dump($val);
                  //   foreach ($val as $check) {
                  //     if ($check == 0) {
                  //       $end = 1;
                  //       break;
                  //     } else {
                  //       $end = 0;
                  //     }
                  //   }
                  // }
                  // if ($end == 1) {
                  //   return $town;
                  // } else {
                  //   continue;
                  // }
                  return $town;
                }
              }
            }
          }
          public function getlastCharForMe () {
              return mb_substr($this->getRespond(), -1, 1);
          }
        }

        $start = new FunctionsForGame ($mytown, $db);
        $respond = $start->getRespond();
          $sql = "INSERT INTO existtowns (name) VALUES ('$respond')";
          mysqli_query($db, $sql);
        $lastCharForMe = $start->getlastCharForMe();
        $db->close();
      ?>
      <p>
        Ответ:<?php echo $respond;?>
      </p>
      <p>
        Название города:</br>
        <input type="text" name="town" placeholder="Город на букву: <?php echo $lastCharForMe;?>"/>
      </p>
      <p>
        <button class="sub" type="submit">Отправить</button>
      </p>
      <p>ИЛИ</p>
      <p>
        <button class="res" type="trese">Очистить историю городов</button>
      </p>
    </form>
  </div>
</body>

</html>