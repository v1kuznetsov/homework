<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <link href="style.css" rel="stylesheet">
  <title>Резюме</title>
</head>

<body>
  <div class="main">
    <?php
    session_start();
    foreach ($_POST as $key => $val) {
      if ($_SESSION[$key] !== $_POST[$key]) {
        $_SESSION[$key] = $val;
      }
      unset($_POST);
    }
    $tel = $_SESSION['tel'];
    setcookie("tel", $tel);
    ?>
    <p>Form 1.1</p>
    <form action="#" method="POST">
      <p>
        Введите имя:</br>
        <input type="text" name="firstnamef" placeholder="Имя" />
      </p>
      <p>
        Введите фамилию:</br>
        <input type="text" name="surnamef" placeholder="Фамилия" />
      </p>
      <p>
        Ваш номер телефона:</br>
        <input type="tel" name="telf" value="<?= $tel ?>" placeholder="Номер телефона" />
      </p>
      <p>
        <button class="sub" type="submit">Отправить</button>
      </p>
      <p>ИЛИ</p>
      <p>
        <button class="res" type="reset">Очистить форму</button>
      </p>
    </form>
  </div>
</body>

</html>