<?php
namespace app\Listeners;

use \SplObserver;
use \SplSubject;

class Listener implements SplObserver
{
    public function update(SplSubject $event)
    {
        $this->handler($event);
    }

    public function handler(SplSubject $event)
    {
        var_dump($event);
    }
}