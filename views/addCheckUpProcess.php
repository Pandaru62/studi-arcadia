<?php

session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define("BASE_URL", '/studi-arcadia');

// Include necessary files
include_once "../models/checkup.class.php";
include_once "../models/checkUpController.class.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["addCheckUp"]) && isset($_SESSION) && $_SESSION['userRole'] == 'vétérinaire') {
    // Get form data
    $userId = $_POST["userId"];
    $animalId = $_POST["animalId"];
    $animalHealth = $_POST["animalHealth"];
    $animalFood = $_POST["animalFood"];
    $foodQuantity = $_POST["foodQuantity"];
    $checkUpDate = $_POST["checkUpDate"];
    $animalOpinion = $_POST["animalOpinion"];

    // Adding check up
    $service = new checkUpController($userId, $animalId, $animalHealth, $animalFood, $foodQuantity, $checkUpDate, $animalOpinion);
    $service->addAnimalCheckUp();

    header("Location: " . BASE_URL . "/checkupanimal?success=checkupadded");

}


