<?php
namespace Test\PHP_UNIT\Js\Model;

use App\Js\Model\Price;
use PHPUnit\Framework\TestCase;

class PriceTest extends TestCase
{
  public function testCreateFromString()
  {
    $this->assertEquals('20', Price::createFromString(20));
  }
}
?>