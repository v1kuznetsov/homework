<?php
namespace App\Lesson20;

class StateFour
{
    public function __construct($T_70)
    {
        $this->T_70 = $T_70;
    }

    public function one()
    {
        $this->T_70->state = new StateThree($this->T_70);
        echo 'perfect3' . PHP_EOL;
    }
    
    public function zero()
    {
        echo 'terrible' . PHP_EOL;
    }

    public function getCheck()
    {
        return 1;
    }
}

?>