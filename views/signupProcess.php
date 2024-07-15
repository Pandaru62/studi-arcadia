<?php
// Display errors for debugging (remove in production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

require_once "../config/script.php";


if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["signupForm"])) {

    $userLastName = $_POST["userLastName"];
    $userFirstName = $_POST["userFirstName"];
    $userEmail = $_POST["userEmail"];
    $userPassword = $_POST["userPassword"];
    $userRole = $_POST["userRole"];

    try {

        if (strlen($userFirstName) < 2 || strlen($userFirstName) > 50) {
            throw new Exception('Le prénom doit comporter au moins 2 caractères et au maximum 50 caractères.');
        }
        if (strlen($userLastName) < 2 || strlen($userLastName) > 50) {
            throw new Exception('Le nom de famille doit comporter au moins 2 caractères et au maximum 50 caractères.');
        }
        if (!filter_var($userEmail) || strlen($userEmail) > 100) {
            throw new Exception('L\'e-mail n\'est pas valide ou dépasse les 100 caractères.');
        }

            // Validate password
        $passwordPattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{8,}$/";

        if (!preg_match($passwordPattern, $userPassword)) {
            throw new Exception('Le mot de passe doit comporter au moins 8 caractères, une majuscule, une minuscule et un caractère spécial.');
        }
        if (strlen($userPassword) > 100) {
            throw new Exception('Le mot de passe ne doit pas dépasser 100 caractères.');
        }

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

        $_SESSION['success'] = 'Un nouvel utilisateur a bien été créé';
        header("location: /signup");
        exit();
    } catch (Exception $e) {
        $_SESSION['error'] = $e->getMessage();
        header("Location: /signup");
        exit();
    }
}
