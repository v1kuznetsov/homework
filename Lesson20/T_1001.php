<?php
namespace App\Lesson20;

use SplSubject;

class T_1001 implements \SplObserver
{
  private int $result = 0;

  public function update(SplSubject $subject)
  {
    $this->result += 1;
  }

  public function getSumBadWork(): int
  {
    return $this->result;
  }
}
?>