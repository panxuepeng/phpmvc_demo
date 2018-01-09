<?php
// 增加了类的自动加载

define('BASE_PATH', dirname(__DIR__));

$request_uri = trim($_SERVER['REQUEST_URI'], "/");

$params = explode('/', $request_uri);


class Application
{
    public $names = [];

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


$app = new Application();


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


