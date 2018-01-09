<?php
namespace app\Http\Controllers;

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
}