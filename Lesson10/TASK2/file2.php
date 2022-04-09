<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <link href="style.css" rel="stylesheet">
  <title>Резюме</title>
</head>

<body>
  <div class="main">
    <p>Form 1.1</p>
    <form action="/file3.php" method="POST">
      <p>
        Ваша фаммилия:</br>
        <input type="text" name="surname" placeholder="Фамилия" />
      </p>
      <p>
        <button class="sub" type="submit">Отправить</button>
      </p>
      <p>ИЛИ</p>
      <p>
        <button class="res" type="reset">Очистить форму</button>
      </p>
    </form>
    <?php
    session_start();
    foreach ($_POST as $key => $val) {
      if ($_SESSION[$key] !== $_POST[$key]) {
        $_SESSION[$key] = $val;
      }
    }
    var_dump($_SESSION);
    ?>
  </div>
</body>

</html>