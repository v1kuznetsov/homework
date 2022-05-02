<?php
  include_once "Dog.php";
  include_once "Cat.php";
  $d = new Dog();
  echo "{$d -> say()} \n";
  $c = new Cat();
  echo "{$c -> say()} \n";
?>