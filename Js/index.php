<?php
require_once '../vendor/autoload.php';

use \Twig\Loader\FilesystemLoader;
use \Twig\Environment;

$loader = new FilesystemLoader(__DIR__ . '/templates');
$twig = new Environment($loader);

$form_array = array (
    array (
      'labelName' => 'id',
      'name' => 'id',
      'id' => 'id',
      'placeholder' => 'int'
    ),
    array (
      'labelName' => 'name',
      'name' => 'name',
      'id' => 'name',
      'placeholder' => 'string'
    ),
    array (
      'labelName' => 'price',
      'name' => 'price',
      'id' => 'price',
      'placeholder' => 'int'
    ),
    array (
      'labelName' => 'season',
      'name' => 'season',
      'id' => 'season',
      'placeholder' => 'string'
    )
  );

  $titles = array (
    'history' => 'История',
    'allTable' => 'Вся таблица',
    'button' => 'Добавить продукт',
    'store' => 'Склад'
  );

  $tables = array (
    'name' => 'name',
    'price' => 'price',
    'season' => 'season',
    'id' => 'id'
  );


echo $twig->render('index.html.twig', ['form_array' => $form_array, 'titles' => $titles, 'tables' => $tables]);
?>