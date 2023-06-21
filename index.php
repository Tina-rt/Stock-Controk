<?php
require_once 'controller/HomeController.php';
require_once 'controller/ClientController.php';
require_once 'controller/admin/AdminController.php';
require_once 'controller/admin/AdminDashboardController.php';

$requestUrl = $_SERVER['REQUEST_URI'];

$parsed_url = parse_url($requestUrl);
$basePath = '/stockcontrol';
$route = $parsed_url['path'];
$route = str_replace($basePath, '', $route);
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
    '/clients/dashboard' => 'ClientDashboardController@dashboard',
    '/clients/logout'=> 'ClientDashboardController@logout',

    '/admin/login'=> 'AdminController@login',
    '/admin/login_process'=> 'AdminController@login_process',
    '/admin/dashboard'=> 'AdminDashboardController@dashboard',
    '/admin/logout'=> 'AdminDashboardController@logout',
];



foreach ($routes as $routePattern => $handler) {
    $pattern = str_replace('/', '\/', $routePattern);
    $pattern = preg_replace('/\{(\w+)\}/', '(\w+)', $pattern);
    $pattern = '/^' . $pattern . '$/';

    // Verifier si route correspond a la liste des routes
    if ($route == $routePattern) {
        [$controllerName, $action] = explode('@', $handler);
        $controllerClassName = ucfirst($controllerName) ;
        $controller = new $controllerClassName();

        // Passer les parametre aux action si il y en a

        if (isset($parsed_url['query'])){
            $controller->$action($parsed_url['query']);

        }
        else{
            $controller->$action();

        }
        

        exit(); 
    }
}

echo "page not found";
