<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <link href="style.css" rel="stylesheet">
  <title>Резюме</title>
</head>

<body>
  <div class="main">
    <p>Form 1</p>
    <form action="/form.php" method="POST">
      <p>
        Ваш номер телефона:</br>
        <input type="tel" name="tel" placeholder="+380" />
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