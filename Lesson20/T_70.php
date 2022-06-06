<?php
class StateOne
{
    public function __construct($T_70)
    {
        $this->T_70 = $T_70;
    }

    public function one()
    {
        $this->T_70->state = new StateOne($this->T_70);
        echo 'perfect0' . PHP_EOL;
    }
    public function zero()
    {
        $this->T_70->state = new StateTwo($this->T_70);
        echo 'bad2' . PHP_EOL;
    }
}

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
        $this->T_70->state = new StateFour($this->T_70);
        echo 'bad5' . PHP_EOL;
    }
}

class ChangeState
{
    public $state;
    public $oneZero;
    public function __construct()
    {
        $this->state = new StateOne($this);
    }

    public function ChangeState($oneZero)
    {
        if ($oneZero == 1)
        {
            $this->state->one();
        }
        else
        {
            $this->state->zero(); 
        }
    }
}


$T = new ChangeState ();
$r = 0;
while ($r != -1)
{
    $r = readline();
    $T->ChangeState($r);  
}
?>