<?php
namespace app\Support\Facades;


class Facade
{
    public function __construct()
    {
        
    }

    public static function __callStatic($method, $arguments) 
    {
        global $app;

        $fadeName = static::getFacadeAccessor();

        $obj = $app->providers[$fadeName];

        return call_user_func_array([$obj, $method], $arguments);
        //return $obj->$method();
    }
}
