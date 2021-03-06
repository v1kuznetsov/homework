<?php
namespace App\Lesson20;

use SplSubject;

class T_1001 implements \SplObserver
{
  public int $result = 0;

  public function update(SplSubject $subject)
  {
    if ($subject->state instanceof StateFour && $subject->previousState instanceof StateFour)
    {
      $this->result += 1;
    }
  }

  public function getSumBadWork(): int
  {
    return $this->result;
  }
}
?>