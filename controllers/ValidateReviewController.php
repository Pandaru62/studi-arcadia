<?php

require_once "./models/reviews.class.php";

class ValidateReviewController extends Reviews {
    public function validateRev() {
        if (isset($_SESSION['userRole']) && ($_SESSION['userRole'] == 'admin' || $_SESSION['userRole'] == 'employé')) {
            if(isset($_GET['id'])) {
                $reviewId = $_GET['id'];
                $validateReview = $this->validateReview($reviewId);
                header('Location: ' . BASE_URL . '/seereviews?success=reviewvalidated');
                exit();
            } else {
                header('Location: ' . BASE_URL . '/seereviews?error=reviewnotvalidated');
                exit();
            }
        } else {
            header("Location: " . BASE_URL);
            exit();
        }
    }
}
    

