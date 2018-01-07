<?php
define('BASE_PATH', dirname(__DIR__));
require_once BASE_PATH . '/vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;


$request = Request::createFromGlobals();

//var_dump($request);

$request_uri = $request->server->get('REQUEST_URI');
/*
$routeArray = [];
$routeArray[] = new Route(
    '/',
    array('_controller' => 'App\Http\Controllers\Controller::index')
);

$routeArray[] = new Route(
    '/hello/{username}',
    array('_controller' => 'App\Http\Controllers\Controller::index'),
    array('username' => '[a-zA-Z0-9]+')
);

$routes = new RouteCollection();

foreach($routeArray as $route) {
    $routes->add('web', $route);
}

var_dump($routes);

$context = new RequestContext('/');

$matcher = new UrlMatcher($routes, $context);

$parameters = $matcher->match($request_uri);

var_dump($parameters);
*/




