<?php

require "../PHPMailer/script.php";

if(isset($_POST["signupForm"])) {

    $userLastName = $_POST["userLastName"];
    $userFirstName = $_POST["userFirstName"];
    $userEmail = $_POST["userEmail"];
    $userPassword = $_POST["userPassword"];
    $userRole = $_POST["userRole"];

    include "../models/signup.class.php";
    include "../models/signupController.php";
    $signup = new SignUpContr($userLastName, $userFirstName, $userEmail, $userPassword, $userRole);

    $signup->signupUser();

    if(!empty($_POST['userEmail'])) {
        $subject = "Bienvenue dans l'équipe Arcadia";
        $message = "Bonjour,
        Vous recevez cet e-mail automatique car l'administrateur du site d'Arcadia vient de vous ajouter en tant qu'utilisateur.
        L'adresse e-mail sur laquelle vous avez reçu cet e-mail vous servira de moyen de connexion. Veuillez vous rapprocher de l'administrateur pour récupérer votre mot de passe.
        Au nom de toute l'équipe, bienvenue !";
        $response = sendMail($_POST["userEmail"], $subject, $message);
    }

    header("location: /studi-arcadia/signup?success=userAdded");
    exit();
}