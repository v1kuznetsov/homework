<?php
namespace App\Lesson20;

use SplObserver;

class T_70 implements \SplSubject
{
    public $state;
    public $previousState;
    public $oneZero;
    public \SplObjectStorage $observers;

    public function __construct()
    {
        $this->state = new StateTwo($this);
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
            $observer->update($this);
        }
    }
#################################################################
    public function ChangeState($oneZero)
    {
        if ($oneZero == 1)
        {
            $this->state->one();
            $this->notify();
        }
        elseif($oneZero == 0)
        {
            $this->state->zero();
            $this->notify();
        }
        
        $this->previousState = $this->state;
    }
}

?>