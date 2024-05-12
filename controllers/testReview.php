<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['validateReview'])) {
    // Check CSRF token
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die('Action non autorisée');
    }
    
    $reviewId = $_POST['reviewId'];
    header("Location: /studi-arcadia/validatereview?id=".$reviewId);
    
} else {
    header("Location: /studi-arcadia/");
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deleteReview'])) {
    // Check CSRF token
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die('Action non autorisée');
    }
    
    $reviewId = $_POST['reviewId'];
    header("Location: /studi-arcadia/deletereview?id=".$reviewId);
    
} else {
    header("Location: /studi-arcadia/");
}