<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
define('BASE_URL', '/studi-arcadia');
require_once "../models/animal.class.php";

    // Create an instance of the Animal class
    $animal = new Animals();

    if (isset($_POST['selectSpecies'])) {
    $id = $_POST['speciesSelect'];

    $selectedSpecies = $animal->getAnimalsBySpecies($id);
    header("Location : " .BASE_URL."/seeanimals");

}

