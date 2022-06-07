<?php
namespace App\Lesson20;
use SplObserver;

class StateOne implements \SplSubject
{
    public \SplObjectStorage $observers;

    public function __construct($T_70)
    {
        $this->observers = new \SplObjectStorage();
        $this->T_70 = $T_70;
    }

#######################################################################
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
        $this->observer->update($this);
    }
}
#######################################################################

    public function one()
    {
        echo 'perfect0' . PHP_EOL;
        $this->notify();
    }

    public function zero()
    {
        $this->T_70->state = new StateTwo($this->T_70);
        echo 'bad2' . PHP_EOL;
    }
}

?>