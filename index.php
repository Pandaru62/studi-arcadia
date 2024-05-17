<?php
session_start();
function generateToken() {
    return bin2hex(random_bytes(32));
}

if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = generateToken();
}

// ERROR HANDLING

ini_set('display_errors', '0');
ini_set('log_errors', '1');

function customErrorHandler($errno, $errstr, $errfile, $errline) {
    // Log the error
    error_log("Error: [$errno] $errstr in $errfile on line $errline");
    
    // Display error message
    echo "Une erreur s'est produite. Veuillez réessayer plus tard.";
    
    return true;
}

set_error_handler("customErrorHandler");

// Your other PHP code...


// CONSTANTS

    define('MONGODB_URI', 'mongodb+srv://lorisbch:OlOa7jVjSSblVm35@arcadia.yirclzp.mongodb.net/arcadia?retryWrites=true&amp;w=majority&amp;ssl=true');
    define("BASE_URL", '');
    define('_SERVICES_IMG_PATH_', '/uploads/services/');

require_once __DIR__ . '/vendor/autoload.php';


// Instanciation classes

// include 'lib/controller-autoloader.php';
// the autoloader automatically gets the paths to the controllers

use Router;
require_once 'models/Router.php';
require_once 'controllers/HomeController.php';
require_once 'controllers/HabitatsController.php';
require_once 'controllers/ServicesController.php';
require_once 'controllers/ContactController.php';
require_once 'controllers/LoginController.php';
require_once 'controllers/LogoutController.php';
require_once 'controllers/ShowHabitatController.php';
require_once 'controllers/FeedingController.php';
require_once 'controllers/ReviewController.php';
require_once 'controllers/ErrorPageController.php';
require_once 'controllers/SignUpController.php';
require_once 'controllers/AccountsController.php';
require_once 'controllers/OpeningTimeController.php';
require_once 'controllers/CheckReviewController.php';
require_once 'controllers/editHabitatController.php';
require_once 'controllers/SeeAnimalsController.php';
require_once 'controllers/SeeSpeciesController.php';
require_once 'controllers/SeeHabitatsCommentsController.php';
require_once 'controllers/VetCheckUpController.php';
require_once 'controllers/FeedingPageController.php';
require_once 'controllers/AnimalDetailsController.php';
require_once 'controllers/SeeFeedingController.php';
require_once 'controllers/DashboardController.php';

// Instanciation router

$router = new Router();

// Visitor pages

$router->addRoute('GET', BASE_URL.'/', 'HomeController', 'index');
$router->addRoute('GET', BASE_URL.'/habitats', 'HabitatsController', 'habitats');
$router->addRoute('GET', BASE_URL.'/services', 'ServicesController', 'services');
$router->addRoute('GET', BASE_URL.'/contact', 'ContactController', 'contact');
$router->addRoute('GET', BASE_URL.'/login', 'LoginController', 'login');
$router->addRoute('GET', BASE_URL.'/logout', 'LogoutController', 'logout');
$router->addRoute('GET', BASE_URL.'/showHabitat', 'ShowHabitatController', 'showHabitat');
$router->addRoute('GET', BASE_URL.'/animal', 'FeedingController', 'showAnimalPage');
$router->addRoute('GET', BASE_URL.'/review', 'ReviewController', 'review');
$router->addRoute('GET', BASE_URL.'/404', 'ErrorPageController', 'displayErrorPage');

// Admin pages

$router->addRoute('GET', BASE_URL.'/signup', 'SignUpController', 'signUp');
$router->addRoute('GET', BASE_URL.'/editaccount', 'AccountsController', 'editAccount');
$router->addRoute('GET', BASE_URL.'/showaccounts', 'AccountsController', 'showAccounts');
$router->addRoute('GET', BASE_URL.'/deleteaccount', 'AccountsController', 'deleteAccount');
$router->addRoute('GET', BASE_URL.'/time', 'OpeningTimeController', 'time');

$router->addRoute('GET', BASE_URL.'/editservice', 'ServicesController', 'editService');
$router->addRoute('GET', BASE_URL.'/addservice', 'ServicesController', 'addService');
$router->addRoute('GET', BASE_URL.'/deleteservice', 'ServicesController', 'deleteServ');

$router->addRoute('GET', BASE_URL.'/deletereview', 'CheckReviewController', 'deleteRev');
$router->addRoute('GET', BASE_URL.'/validatereview', 'CheckReviewController', 'validateRev');

$router->addRoute('GET', BASE_URL.'/edithabitat', 'editHabitatController', 'editHab');
$router->addRoute('GET', BASE_URL.'/addhabitat', 'editHabitatController', 'addHab');
$router->addRoute('GET', BASE_URL.'/deletehabitat', 'editHabitatController', 'deleteHab');

$router->addRoute('GET', BASE_URL.'/seeanimals', 'SeeAnimalsController', 'seeAnimals');
$router->addRoute('GET', BASE_URL.'/editanimal', 'SeeAnimalsController', 'editAnim');
$router->addRoute('GET', BASE_URL.'/deleteanimal', 'SeeAnimalsController', 'deleteAnim');
$router->addRoute('GET', BASE_URL.'/addanimal', 'SeeAnimalsController', 'addAnim');

$router->addRoute('GET', BASE_URL.'/addspecies', 'SeeSpeciesController', 'addSpec');
$router->addRoute('GET', BASE_URL.'/editspecie', 'SeeSpeciesController', 'editSpec');
$router->addRoute('GET', BASE_URL.'/deletespecies', 'SeeSpeciesController', 'deleteSpec');
$router->addRoute('GET', BASE_URL.'/dashboard', 'DashboardController', 'showDashboard');

// Vet
$router->addRoute('GET', BASE_URL.'/commenthabitat', 'SeeHabitatsCommentsController', 'addHabComment');
$router->addRoute('GET', BASE_URL.'/seeHabitatComment', 'SeeHabitatsCommentsController', 'seeHabComment');
$router->addRoute('GET', BASE_URL.'/checkupanimal', 'VetCheckUpController', 'addCheckUp');
$router->addRoute('GET', BASE_URL.'/seecheckup', 'VetCheckUpController', 'seeCheckUp');

$router->addRoute('GET', BASE_URL.'/feeding', 'FeedingPageController', 'feedAnimal');
$router->addRoute('GET', BASE_URL.'/show', 'AnimalDetailsController', 'showAnimal');
$router->addRoute('GET', BASE_URL.'/seefeeding', 'SeeFeedingController', 'seeFeeding');


$router->dispatch();
