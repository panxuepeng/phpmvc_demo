<?php
// 增加服务提供者

define('BASE_PATH', dirname(__DIR__));

$request_uri = trim($_SERVER['REQUEST_URI'], "/");

$params = explode('/', $request_uri);

// 辅助函数
require BASE_PATH.'/app/helpers.php';

class Application
{
    // 服务提供者数组
    public $providers = [];

    public function __construct() {
        spl_autoload_register(array($this, 'loaderClass'));
    }

    private function loaderClass($className) {


        $className = str_replace('\\', '/', $className);

        //include_once $className . '.php';

        $someClass = BASE_PATH.'/'.$className.'.php';

        if (file_exists($someClass)) {

            require $someClass;

        } else {

            exit($someClass . ' Class Not Found!');
        }
    }
}

class Cache
{
    public function __construct()
    {
        
    }

    protected static function getFacadeAccessor()
    {
        return 'cache';
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

class RedisCache
{
    public function get($key)
    {
        return 'RedisCache->get()';
    }

    public function set($key, $value)
    {
        return 'RedisCache->set()';
    }
}


$app = new Application();


// 注册 cache 缓存服务
$app->providers['cache'] = new RedisCache();


$controllerName = array_shift($params) ?: 'home';
$methodName = array_shift($params) ?: 'index';

$controllerName = ucfirst(strtolower($controllerName)) . 'Controller';


$controllerClass = "app\\Http\\Controllers\\$controllerName";

$controller = new $controllerClass();

if (method_exists($controller, $methodName)) {
    
    call_user_func_array([$controller, $methodName], $params);

} else {
    exit($methodName . ' Action Not Found!');
}


