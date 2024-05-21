<?php

session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['validateReview'])) {
    // Check CSRF token
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die('Action non autorisée');
    } else {
    
    $reviewId = $_POST['reviewId'];
    header("Location: /validatereview?id=".$reviewId);
    var_dump($reviewId);
    }
} elseif($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deleteReview'])) {
    // Check CSRF token
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die('Action non autorisée');
    } else {
    
    $reviewId = $_POST['reviewId'];
    header("Location: /deletereview?id=".$reviewId);
    }
} else {
    header("Location: /");
}
