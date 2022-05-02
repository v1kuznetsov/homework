<?php
  class City {
    private $name, $popularity;

    public function __construct(string $name, int $popularity) {
      $this->name = $name;
      $this->popularity = $popularity;
    }

    public function getInfo (): string|int {
      if (strlen($this->name) < 8) {
        $tab = "\t";
      } else {
        $tab = "";
      }
      return 'Название города:' . $this->name . "\t$tab" . 'Население:' . $this->popularity . "\n";
    }
  }

$city1 = new City('Kharkiv', 2000000);
echo $city1->getInfo();
$city2 = new City('Lviv', 5300000);
echo $city2->getInfo();
$city3 = new City('Kyiv', 10100000);
echo $city3->getInfo();
$city4 = new City('Sumy', 4230000);
echo $city4->getInfo();
$city5 = new City('Dnipro', 64700000);
echo $city5->getInfo();
$city6 = new City('Odessa', 68000000);
echo $city6->getInfo();
$city7 = new City('Krivyy Rig', 4000000);
echo $city7->getInfo();
?>