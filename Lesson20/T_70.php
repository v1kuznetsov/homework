<?php
namespace App\Lesson20;

use SplObserver;

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
                $observer->update($this);
                // if($observer instanceof T_1000)
                // {
                //     $observer->update($this);
                // }
            }
            elseif($this->state instanceof StateFour)
            {
                $observer->update($this);
                // if($observer instanceof T_1001)
                // {
                //     $observer->update($this);
                // }
            }
        }
    }
#################################################################
    public function ChangeState($oneZero)
    {
        if ($oneZero == 1)
        {
            $this->state->one();
            
            // if ($this->state instanceof StateOne)
            // {
                $this->notify();
            // }
            
        }
        elseif($oneZero == 0)
        {
            $this->state->zero();

            // if ($this->state instanceof StateFour)
            // {
                $this->notify();
            // }
        }
    }
}

?>