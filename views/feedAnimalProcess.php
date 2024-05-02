<?php

session_start();

define("BASE_URL", '/studi-arcadia');

// Include necessary files
include_once "../models/feeding.class.php";
include_once "../models/feedingController.class.php";


// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["feedAnimal"]) && isset($_SESSION) && ($_SESSION['userRole'] == 'employé' || $_SESSION['userRole'] == 'admin')) {
    // Get form data
    $feedingAnimalId = $_POST["feedingAnimalId"];
    $feedingDate = $_POST["feedingDate"];
    $feedingTime = $_POST["feedingTime"];
    $feedingFood = $_POST["feedingFood"];
    $foodQuantity = $_POST["foodQuantity"];


    // Adding feeding
    $service = new FeedingContr($feedingAnimalId, $feedingDate, $feedingTime, $feedingFood, $foodQuantity);
    $service->addFeeding();

    header("Location: " . BASE_URL . "/feeding?success=foodrecorded");

}

