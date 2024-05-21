<?php
// Report all PHP errors
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

session_start();

require_once "../models/Dbh.php";
require_once "../config/script.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ContactForm'])) {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die('Erreur CSRF !');
    }
    try {
        $subject = $_POST["contactTitle"];
        $email = filter_var($_POST["contactEmail"], FILTER_SANITIZE_EMAIL);
        $message = htmlspecialchars($_POST["contactMessage"], ENT_QUOTES | ENT_HTML5, 'UTF-8');

        if (empty($subject) || empty($email) || empty($message) || strlen($subject) < 3 || strlen($message) < 20) {
            throw new Exception("Champs invalides");
        }

        // Encode the subject to handle UTF-8 characters properly
        $subject = '=?UTF-8?B?' . base64_encode($subject) . '?=';

        $response = sendContactFormMail($email, $subject, $message);

        if ($response) {
            $_SESSION['success'] = "Votre avis a bien été envoyé.";
        } else {
            throw new Exception("Une erreur s'est produite lors de l'envoi de l'email.");
        }
    } catch (Exception $e) {
        $_SESSION['error'] = $e->getMessage();
    }

    // Redirect to the contact page
    header("Location: " . BASE_URL . "/contact");
    exit();
}
