<?php
namespace App\Lesson20;

use SplSubject;

class T_1000 implements \SplObserver
{
  public int $result = 0;

  public function update(SplSubject $subject)
  {
    if ($subject->state instanceof StateOne && $subject->previousState instanceof StateOne)
    {
      $this->result += 1;
    }
  }

  public function getSumPerfectWork(): int
  {
    return $this->result;
  }
}
?>