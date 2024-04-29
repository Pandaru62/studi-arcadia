<?php

require_once "./models/reviews.class.php";

class deleteReviewController extends Reviews {
    public function deleteRev() {
        if (isset($_GET['id']) && isset($_SESSION['userRole']) && ($_SESSION['userRole'] == 'admin' || $_SESSION['userRole'] == 'employé')) {
            $reviewId = $_GET['id'];
            $deletedReview = $this->deleteReview($reviewId);
            header('Location: ' . BASE_URL . '/seereviews?success=reviewdeleted');
            exit;
        } elseif (!isset($_GET['id'])) {
            header("Location: " . BASE_URL);
            exit;
        } else {
            header('Location: ' . BASE_URL . '/seereviews?error=reviewdeleted');
            exit;
        }
    }
}
