<?php

namespace app\Http\Middleware;

class Log
{
    public function __construct()
    {
        
    }

    public function handle(\Closure $next)
    {
        //throw new \Exception('log');
        
        $next();
        echo '<br>Log Middleware!';
    }
}