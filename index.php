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
require_once 'controllers/ShowHabitatController.php';
require_once 'controllers/FeedingController.php';
require_once 'controllers/ReviewController.php';


// Instanciation router 

$router = new Router();

$router->addRoute('GET', BASE_URL.'/', 'HomeController', 'index');
$router->addRoute('GET', BASE_URL.'/habitats', 'HabitatsController', 'habitats');
$router->addRoute('GET', BASE_URL.'/services', 'ServicesController', 'services');
$router->addRoute('GET', BASE_URL.'/contact', 'ContactController', 'contact');
$router->addRoute('GET', BASE_URL.'/login', 'LoginController', 'login');
$router->addRoute('GET', BASE_URL.'/showHabitat', 'ShowHabitatController', 'showHabitat');
// $router->addRoute('GET', BASE_URL.'/animal', 'AnimalController', 'showAnimal');
$router->addRoute('GET', BASE_URL.'/animal', 'FeedingController', 'showFeeding');
$router->addRoute('GET', BASE_URL.'/review', 'ReviewController', 'review');



$router->dispatch();
