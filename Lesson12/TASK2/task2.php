<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <link href="style.css" rel="stylesheet">
  <title>Add fruct</title>
</head>

<body>
  <div class="main">
    <p>Добавь свой фрук в мега таблицу!!!</p>
    <form action="result.php" method="POST">
      <p>
        Введите название фрукта:</br>
        <input type="text" name="fruct_name" placeholder="Название" />
      </p>
      <p>
        Выберите его сезон:</br>
      <div class="rad">
        <input type="radio" name="season" value="Summer" />Summer</br>
        <input type="radio" name="season" value="Autumn" />Autumn</br>
        <input type="radio" name="season" value="Winter" />Winter</br>
        <input type="radio" name="season" value="Spring" />Spring</br>
      </div>
      </p>
      <p>
        <input type="number" name="price" placeholder="***грн.">
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