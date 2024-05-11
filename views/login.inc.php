<?php
session_start();

if(isset($_POST["loginForm"])) {
    $userEmail = filter_var($_POST["userEmail"], FILTER_SANITIZE_EMAIL);
    $userPassword = $_POST["userPassword"];

    if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Format de l'email invalide.";
        header("Location: /studi-arcadia/login");
        exit();
    }

    include "../models/login.class.php";
    include "../models/loginContr.class.php";

    try {
        $signup = new LoginContr($userEmail, $userPassword);
        $signup->loginUser();
        
        // if login ok
        $_SESSION['success'] = "Vous êtes connecté.";
        header("location: ".BASE_URL);
        exit();
    } catch (Exception $e) {
        // Catch any exception
        $_SESSION['error'] = "Une erreur s'est produite. Veuillez réessayer.";
        header("location: ".BASE_URL."/login");
        exit();
    }
}

