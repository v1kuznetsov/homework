<?php
namespace App\Lesson20;

require_once '../vendor/autoload.php';

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
        echo 'manager - ' . $manager->getSumBadWork() . PHP_EOL; 
    }
    elseif ($r == 0)
    {
        $T->ChangeState($r);
        echo 'hr - ' . $hr->getSumPerfectWork() . PHP_EOL;
        echo 'manager - ' . $manager->getSumBadWork() . PHP_EOL; 
    }
    else
    {
        echo 'wrong number' . PHP_EOL;
        $r = -1;
    }
}

?>