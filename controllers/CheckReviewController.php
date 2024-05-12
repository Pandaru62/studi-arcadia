<?php

require_once "./models/reviews.class.php";

class CheckReviewController extends Reviews {
    public function validateRev() {

        if (isset($_SESSION['userRole']) && ($_SESSION['userRole'] == 'admin' || $_SESSION['userRole'] == 'employé')) {
            if(isset($_GET['id'])) {
                $reviewId = $_GET['id'];
                $validateReview = $this->validateReview($reviewId);
                header('Location: ' . BASE_URL . '/review?success=reviewvalidated');
                exit();
            } else {
                header('Location: ' . BASE_URL . '/review?error=reviewnotvalidated');
                exit();
            }
        } else {
            header("Location: " . BASE_URL);
            exit();
        }

    }

    public function deleteRev() {
        if (isset($_SESSION['userRole']) && ($_SESSION['userRole'] == 'admin' || $_SESSION['userRole'] == 'employé')) {
            if(isset($_GET['id'])) {
            $reviewId = $_GET['id'];
            $deletedReview = $this->deleteReview($reviewId);
            header('Location: ' . BASE_URL . '/review?success=reviewdeleted');
            exit();
            } else {
            header('Location: ' . BASE_URL . '/review?error=reviewdeleted');
            exit();
            }
        } else {
            header("Location: " . BASE_URL);
            exit;
        }
    }
}
    

