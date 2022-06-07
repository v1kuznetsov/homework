<?php
namespace App\Lesson20;

class StateTwo
{
    public function __construct($T_70)
    {
        $this->T_70 = $T_70;
    }

    public function one()
    {
        $this->T_70->state = new StateOne($this->T_70);
        echo 'perfect1' . PHP_EOL;
    }
    public function zero()
    {
        $this->T_70->state = new StateThree($this->T_70);
        echo 'bad3' . PHP_EOL;
    }
}

?>