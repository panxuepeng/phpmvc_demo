<?php
//namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index($a, $b = '')
    {

        echo 'index';
    }

    public function hello($a, $b)
    {
        echo 'hello';
    }
}