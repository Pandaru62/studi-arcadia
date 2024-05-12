<?php

session_start();

if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    die('Erreur CSRF !'); 
}

// Include necessary files
include_once "../models/habitatcomment.class.php";
include_once "../models/habitatcommentcontroller.class.php";


// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["addHabitatComment"]) && isset($_SESSION) && ($_SESSION['userRole'] == 'vétérinaire' || $_SESSION['userRole'] == 'admin')) {
    // Get form data
    $userId = $_POST["userId"];
    $commentHabitat = $_POST["commentHabitat"];
    $commentDescription = $_POST["commentDescription"];

    // Adding comment
    $service = new HabitatCommentController($userId, $commentHabitat, $commentDescription);
    $service->commentHabitat();

    header("Location: " . BASE_URL . "/commenthabitat?success=commentsent");

}

