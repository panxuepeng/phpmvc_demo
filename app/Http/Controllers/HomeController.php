<?php
namespace app\Http\Controllers;

use app\Events\MyEvent;
use app\Listeners\MyListener;

class HomeController extends Controller
{

    public function __construct(MyEvent $event)
    {
        
    }

    public function index($a=null, $b = null)
    {
        //echo 'index';
        echo \Cache::get('key');
    }

    public function hello($a, $b)
    {
        echo 'hello';
    }

    public function event(MyEvent $event, $id=1)
    {
        echo $id;
        echo 'event';
        //throw new \Exception('event');
        //require 'a.php';
        //echo 1/0;
        event(new MyEvent());
    }
}