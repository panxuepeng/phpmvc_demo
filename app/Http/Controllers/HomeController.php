<?php

class HomeController extends Controller
{
    public function index($a = null, $b = '')
    {
        echo "index: $a $b";
    }

    public function hello($a, $b)
    {
        echo 'hello';
    }
}