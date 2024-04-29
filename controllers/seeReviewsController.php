<?php

require_once "./models/reviews.class.php";

class seeReviewsController extends Reviews {
        public function seeReviews() {
            if (isset($_SESSION['userRole']) && $_SESSION['userRole'] == 'admin' || $_SESSION['userRole'] == 'employé') {
                $allReviews = $this->getReviews();
                require_once "./views/employe/see_reviews.php";
        }
    }
}