<?php
namespace App\Lesson20;

class StateThree
{
    public function __construct($T_70)
    {
        $this->T_70 = $T_70;
    }

    public function one()
    {
        $this->T_70->state = new StateTwo($this->T_70);
        echo 'perfect2' . PHP_EOL;
    }
    public function zero()
    {
        $this->T_70->state = new StateFour($this->T_70);
        echo 'bad4' . PHP_EOL;
    }
}

?>