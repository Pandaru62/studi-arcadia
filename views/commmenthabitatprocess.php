<?php

session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define("BASE_URL", '/studi-arcadia');

// Include necessary files
include_once "../models/habitatcomment.class.php";
include_once "../models/habitatcommentcontroller.class.php";


// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["addHabitatComment"]) && isset($_SESSION) && $_SESSION['userRole'] == 'vétérinaire') {
    // Get form data
    $userId = $_POST["userId"];
    $commentHabitat = $_POST["commentHabitat"];
    $commentDescription = $_POST["commentDescription"];

    // Adding comment
    $service = new HabitatCommentController($userId, $commentHabitat, $commentDescription);
    $service->commentHabitat();

    header("Location: " . BASE_URL . "/commenthabitat?success=commentsent");

}

