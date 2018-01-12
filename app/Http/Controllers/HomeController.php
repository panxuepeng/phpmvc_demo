<?php
namespace app\Http\Controllers;

use app\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index($a=null, $b = null)
    {
        echo "index: $a $b ". Cache::get('key');
    }

    public function hello($a, $b)
    {
        echo 'hello';
    }
}