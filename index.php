<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// CONSTANTS

define("BASE_URL", '/studi-arcadia');
define('_SERVICES_IMG_PATH_', '/studi-arcadia/uploads/services/');
define('_MENU_PATH_', './src/controllers/');

// $habitats = [
//     "Marais", "Jungle", "Savane"
// ];

// Instanciation classes

// include 'lib/controller-autoloader.php'; 
// the autoloader automatically gets the paths to the controllers
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
require_once 'controllers/EditAccountController.php';
require_once 'controllers/showAccountsController.php';
require_once 'controllers/deleteAccountController.php';
require_once 'controllers/OpeningTimeController.php';
require_once 'controllers/editServiceController.php';
require_once 'controllers/addServicesController.php';
require_once 'controllers/DeleteServiceController.php';
require_once 'controllers/deleteReviewController.php';
require_once 'controllers/validateReviewController.php';
require_once 'controllers/editHabitatController.php';
require_once 'controllers/SeeAnimalsController.php';
require_once 'controllers/SeeSpeciesController.php';
require_once 'controllers/SeeHabitatsCommentsController.php';
require_once 'controllers/VetCheckUpController.php';
require_once 'controllers/FeedingPageController.php';
require_once 'controllers/AnimalDetailsController.php';
require_once 'controllers/SeeFeedingController.php';


// Instanciation router 

$router = new Router();

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
$router->addRoute('GET', BASE_URL.'/editaccount', 'EditAccountController', 'editAccount');
$router->addRoute('GET', BASE_URL.'/showaccounts', 'showAccountsController', 'showAccounts');
$router->addRoute('GET', BASE_URL.'/deleteaccount', 'deleteAccountController', 'deleteAccount');
$router->addRoute('GET', BASE_URL.'/time', 'OpeningTimeController', 'time');

$router->addRoute('GET', BASE_URL.'/editservice', 'editServiceController', 'editService');
$router->addRoute('GET', BASE_URL.'/addservice', 'addServicesController', 'addService');
$router->addRoute('GET', BASE_URL.'/deleteservice', 'deleteServiceController', 'deleteServ');

$router->addRoute('GET', BASE_URL.'/deletereview', 'deleteReviewController', 'deleteRev');
$router->addRoute('GET', BASE_URL.'/validatereview', 'ValidateReviewController', 'validateRev');

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
$router->addRoute('GET', BASE_URL.'/seefeeding', 'SeeFeedingController', 'seeFeeding'); // à voir



$router->dispatch();
