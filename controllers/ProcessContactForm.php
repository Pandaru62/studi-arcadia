<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'sendReviewController.php';

$controller = new SendReviewController();

// Call the sendReview function
$review = $controller->sendReview();

