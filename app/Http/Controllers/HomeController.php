<?php
namespace app\Http\Controllers;

class HomeController extends Controller
{
    public function index($a=null, $b = null)
    {
        echo "index $a $b";
    }

    public function hello($a, $b)
    {
        echo 'hello';
    }
}