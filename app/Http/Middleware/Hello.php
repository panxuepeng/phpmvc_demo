<?php

namespace app\Http\Middleware;

class Hello
{
    public function __construct()
    {
        
    }

    public function handle(\Closure $next)
    {
        //throw new \Exception('hello');
        
        $next();
        echo 'hello Middleware!';
    }
}