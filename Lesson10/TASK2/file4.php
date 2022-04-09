<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <link href="style.css" rel="stylesheet">
  <title>Резюме</title>
</head>

<body>
  <div class="main">
    <p>Final</p>
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