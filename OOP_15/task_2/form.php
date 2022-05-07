<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <link href="style/style.css" rel="stylesheet">
  <title>Города</title>
  <?php
      $mytown = ($_POST["town"]);
      
      require_once '/home/vlad/HomeWorks/vendor/autoload.php';
      use App\OOP_15\task_2\repository\FunctionsForGame;

      $start = new FunctionsForGame ("$mytown");
      
      $respond = $start->getRespond();
      
      $lastCharForMe = $start->getlastCharForMe();
    ?>  
</head>

<body>
  <div class="main">
    <p>Города игра</p>
    <form action="/form.php" method="POST">
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