<?php

session_start();

// Include necessary files
include_once "../models/signup.class.php";
include_once "../models/signupController.php";

if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    die('Erreur CSRF !'); 
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["editAccountForm"])) {
    // Get form data
    $userId = $_POST["userId"];
    $userLastName = $_POST["userLastName"];
    $userFirstName = $_POST["userFirstName"];
    $userEmail = $_POST["userEmail"];
    $userPassword = $_POST["userPassword"];
    $userRole = $_POST["userRole"];


    // Update user
    $signupController = new SignUpContr($userLastName, $userFirstName, $userEmail, $userPassword, $userRole);
    $signupController->updateUser($userId);

    header("Location: /showaccounts?success=accountedited");
    exit();

} else {
    header("Location: /showaccounts?error=accountnotedited");
    exit();
}


