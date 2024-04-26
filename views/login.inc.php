<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_POST["loginForm"])) {
    $userEmail = $_POST["userEmail"];
    $userPassword = $_POST["userPassword"];

    include "../models/login.class.php";
    include "../models/loginContr.class.php";

    try {
        $signup = new LoginContr($userEmail, $userPassword);
        $signup->loginUser();
        
        // If login successful, redirect or do further processing
        header("location: /studi-arcadia");
        exit();
    } catch (Exception $e) {
        // Catch any exception
        header("Location: /studi-arcadia/login?error=" . urlencode($e->getMessage()));
        exit();
    }
}

