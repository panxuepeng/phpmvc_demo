<?php
namespace app\Http\Controllers;

use app\Events\MyEvent;
use app\Listeners\MyListener;

class HomeController extends Controller
{
    public function index($a=null, $b = null)
    {
        //echo 'index';
        echo \Cache::get('key');
    }

    public function hello($a, $b)
    {
        echo 'hello';
    }

    public function event()
    {
        event(new MyEvent());
    }
}