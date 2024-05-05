<?php

require_once "./models/reviews.class.php";

class ValidateReviewController extends Reviews {
    public function validateRev() {
        if (isset($_GET['id']) && isset($_SESSION['userRole']) && ($_SESSION['userRole'] == 'admin' || $_SESSION['userRole'] == 'employé')) {
            $reviewId = $_GET['id'];
            $validateReview = $this->validateReview($reviewId);
            header('Location: ' . BASE_URL . '/seereviews?success=reviewvalidated');
            exit;
        } elseif (!isset($_GET['id'])) {
            header("Location: " . BASE_URL);
            exit;
        } else {
            header('Location: ' . BASE_URL . '/seereviews?error=reviewnotvalidated');
            exit;
        }
    }
}
    

