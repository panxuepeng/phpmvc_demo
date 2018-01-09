<?php
define('BASE_PATH', dirname(__DIR__));

$request_uri = trim($_SERVER['REQUEST_URI'], "/");

$params = explode('/', $request_uri);









$controllerName = array_shift($params) ?: 'home';
$methodName = array_shift($params) ?: 'index';

$controllerName = ucfirst(strtolower($controllerName)) . 'Controller';

require BASE_PATH.'/app/Http/Controllers/Controller.php';

$controllerClass = BASE_PATH."/app/Http/Controllers/$controllerName.php";

if (file_exists($controllerClass)) {
    require $controllerClass;

    $controller = new $controllerName();

    if (method_exists($controller, $methodName)) {
        
        call_user_func_array([$controller, $methodName], $params);

    } else {
        exit($methodName . ' Action Not Found!');
    }

} else {
    exit($controllerName . ' Class Not Found!');
}
