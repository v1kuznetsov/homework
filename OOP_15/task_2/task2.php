<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <link href="style/style.css" rel="stylesheet">
  <title>Города</title>
</head>

<body>
  <div class="main">
    <p>Города</p>
    <form action="/form.php" method="POST">
      <p>
        Город:</br>
        <input type="text" name="town" placeholder="Давайте начнем с города Харьков" />
      </p>
      <p>
        <button class="sub" type="submit">Отправить</button>
      </p>
      <p>
        ИЛИ
      </p>
      <p>
        <button class="res" type="reset">Очистить форму</button>
      </p>
    </form>
  </div>
</body>

</html>