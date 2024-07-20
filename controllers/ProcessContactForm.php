<?php
require_once 'sendReviewController.php';

if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    die('Erreur CSRF !');
}

$controller = new SendReviewController();

// Call the sendReview function
$review = $controller->sendReview();