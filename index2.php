
<?php 


//     $url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
var_dump($_SERVER['REQUEST_URI']);

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('src/controllers/homepage.php');
require_once('src/controllers/services.php');
require_once('src/controllers/habitats.php');

 

if (isset($_GET['action']) && $_GET['action'] !== '') {
	switch($_GET['action']) {
    case "services": services();
    break;
    case "contact": services();
    break;
    case "habitats" : habitats();
    break;
    default: homepage();
    }
} else {
	homepage();
}
