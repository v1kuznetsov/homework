<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <link href="style.css" rel="stylesheet">
  <title>Резюме</title>
</head>

<body>
  <div class="main">
    <form action="/form.php" method="POST">
      <p>
        Введите имя:</br>
        <input type="text" name="firstname" placeholder="Ваше чудесное имя писать сюда." />
      </p>
      <p>
        Введите возраст:</br>
        <input type="text" name="age" placeholder="Здесь должны быть цифры, но..." />
      </p>
      <p>
        Ваш номер телефона:</br>
        <input type="tel" name="telnumber" placeholder="Телефончик пожалуйста!" />
      </p>
      <p>
        Ваше фото:</br>
        <input type="file" name="photo">
      </p>
      <p>
        Что?:</br>
        <input type="radio" name="simple_question" value="Yes" checked>Да!
        <input type="radio" name="simple_question" value="No">Нет
      </p>
      <p>
        О себе:</br>
        <textarea name="myself" maxlength="1000" placeholder="Любые подробности..."></textarea>
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