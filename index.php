<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define("BASE_URL", '/studi-arcadia');

// Instanciation classes

require_once 'models/Router.php';
require_once 'models/User.php';
require_once 'controllers/HomeController.php';
require_once 'controllers/HabitatsController.php';
require_once 'controllers/ServicesController.php';
require_once 'controllers/ContactController.php';
require_once 'controllers/LoginController.php';



// Instanciation router 

$router = new Router();

$router->addRoute('GET', BASE_URL.'/', 'HomeController', 'index');
$router->addRoute('GET', BASE_URL.'/habitats', 'HabitatsController', 'habitats');
$router->addRoute('GET', BASE_URL.'/services', 'ServicesController', 'services');
$router->addRoute('GET', BASE_URL.'/contact', 'ContactController', 'contact');
$router->addRoute('GET', BASE_URL.'/login', 'LoginController', 'login');



$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];
$handler = $router->gethandler($method, $uri);

// echo($method)."<br/>";
// echo($uri)."<br/>";
// var_dump($handler);

if ($handler == null ) { 

    header ('HTTP/1.1 404 not found');
    exit();
}

// APPEL CONTROLLEUR

$controller = new $handler['controller']();
$action = $handler['action'];
$controller->$action();

// var_dump($action);