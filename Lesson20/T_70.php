<?php
namespace App\Lesson20;
use SplObserver;

require_once '../vendor/autoload.php';

class T_70 extends StateOne
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
        elseif($oneZero == 0)
        {
            $this->state->zero();
        }
    }
}


$T = new T_70 ();
$hr = new T_1000();
// $T->state->attach($hr);

$manager = new T_1001();

while (@ $r != -1)
{
    $r = readline();

    if ($r == 1)
    {
        $T->ChangeState($r);
        echo 'hr - ' . $hr->getSumPerfectWork() . PHP_EOL; 
    }
    elseif ($r == 0)
    {
        $T->ChangeState($r);
        echo 'manager - ' . $manager->getSumBadWork() . PHP_EOL;
    }
    else
    {
        echo 'wrong number' . PHP_EOL;
        $r = -1;
    }
}
?>