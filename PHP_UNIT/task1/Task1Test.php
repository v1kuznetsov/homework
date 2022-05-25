<?php
namespace Test\PHP_UNIT\task1;

use App\PHP_UNIT\task1\Task1;
use PHPUnit\Framework\TestCase;

class Task1Test extends TestCase
{
  public function testFirstTask()
  {
    $test = new Task1(2, [1,2,3]);
    $this->assertEquals([2,4,6], $test->firstTask());
  }

  public function testSecondTask()
  {
    $test = new Task1(22, [1,2,3]);
    $this->assertEquals(4, $test->secondTask());
  }

  public function testThirtTask()
  {
    $test = new Task1(2, [1,2,3]);
    $this->assertEquals(6, $test->thirtTask());
  }

  public function testFouthTask()
  {
    $test = new Task1(2, [1,2,3]);
    $this->assertEquals([3], $test->fouthTask());
  }
}

?>