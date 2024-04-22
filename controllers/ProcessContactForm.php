<?php
require_once 'sendReviewController.php';

$controller = new SendReviewController();

// Call the sendReview function
$review = $controller->sendReview();

// Perform redirection after sending the review
header("Location: /studi-arcadia/review?sent=true");
exit();
