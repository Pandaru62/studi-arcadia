<?php


session_start();

// Check CSRF token
if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    die('Erreur CSRF !'); 
}

if(isset($_POST["loginForm"])) {
    $userEmail = filter_var($_POST["userEmail"], FILTER_SANITIZE_EMAIL);
    $userPassword = $_POST["userPassword"];

    if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Format de l'email invalide.";
        die(header("location: /login"));
    }

    include "../models/login.class.php";
    include "../models/loginContr.class.php";

    try {
        $signup = new LoginContr($userEmail, $userPassword);
        $signup->loginUser();
        
        // If login is successful
        $_SESSION['success'] = "Vous êtes connecté.";
        die(header("location: /"));
    } catch (Exception $e) {
        // Catch any exception
        $_SESSION['error'] = "Une erreur s'est produite. Veuillez réessayer.";
        die(header("location: /login"));
    }
}

