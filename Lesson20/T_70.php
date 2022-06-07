<?php
namespace App\Lesson20;

use SplObserver;

require_once '../vendor/autoload.php';

class T_70 implements \SplSubject
{
    public $state;
    public $oneZero;
    public \SplObjectStorage $observers;

    public function __construct()
    {
        $this->state = new StateOne($this);
        $this->observers = new \SplObjectStorage();
    }
#################################################################
    public function attach(SplObserver $observer)
    {
        $this->observers->attach($observer);
    }

    public function detach(SplObserver $observer)
    {
        $this->observers->detach($observer);
    }

    public function notify()
    {
        foreach($this->observers as $observer)
        {
            if($this->state instanceof StateOne)
            {
                if($observer instanceof T_1000)
                {
                    $observer->update($this);
                }
            }
            elseif($this->state instanceof StateFour)
            {
                if($observer instanceof T_1001)
                {
                    $observer->update($this);
                }
            }
        }
    }
#################################################################
    public function ChangeState($oneZero)
    {
        if ($oneZero == 1)
        {
            $this->state->one();
            
            if ($this->state instanceof StateOne)
            {
                $this->notify();
            }
            
        }
        elseif($oneZero == 0)
        {
            $this->state->zero();

            if ($this->state instanceof StateFour)
            {
                $this->notify();
            }
        }
    }
}


$T = new T_70 ();

$hr = new T_1000();
$T->attach($hr);

$manager = new T_1001();
$T->attach($manager);

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