<?php
class ReviewController extends Reviews {
    use getHabitats;
    public function review() {
        $menuHabitats = $this->getHabitats();
        if (isset($_SESSION['userRole']) && ($_SESSION['userRole'] == 'admin' || $_SESSION['userRole'] == 'employé')) {
            $allReviews = $this->getReviews();
            require_once "./views/employe/see_reviews.php";
        } else {
            $lastCheckedReviews = $this->getLastReviews(1, 5);
            require_once "./views/review.php";
        }
    }
}

