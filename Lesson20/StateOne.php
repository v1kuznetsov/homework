<?php
namespace App\Lesson20;

class StateOne
{
    public function __construct($T_70)
    {
        $this->T_70 = $T_70;
    }

    public function one()
    {
        echo 'exelent' . PHP_EOL;
    }

    public function zero()
    {
        $this->T_70->state = new StateTwo($this->T_70);
        echo 'bad2' . PHP_EOL;
    }
}

?>