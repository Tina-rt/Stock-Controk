<?php
require_once 'controller/HomeController.php';
require_once 'controller/ClientController.php';
$requestUrl = $_SERVER['REQUEST_URI'];

$basePath = '/stockcontrol';
$route = str_replace($basePath, '', $requestUrl);
echo $route;
$routes = [
    '/' => 'HomeController@index',
    '/clients' => 'ClientController@index',
    '/clients/inscription' => 'ClientController@form_',
    '/clients/login' => 'ClientController@login_form',
    '/clients/login_process' => 'ClientController@login_process',
    '/clients/edit' => 'ClientController@edit',
    '/clients/update' => 'ClientController@update',
    '/clients/delete' => 'ClientController@delete',
];

if (array_key_exists($route, $routes)) {
    [$controllerName, $action] = explode('@', $routes[$route]);
    $controllerClassName = ucfirst($controllerName);
    $controller = new $controllerClassName();
    $controller->$action();
} else {
    echo '404 - Page not found';
}
