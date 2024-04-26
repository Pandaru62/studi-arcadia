<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include necessary files
include_once "../models/signup.class.php";
include_once "../models/signupController.php";


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

    header("Location: " . BASE_URL . "/editaccount?success=userEdited");

}


