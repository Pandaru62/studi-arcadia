<?php

require_once "../models/reviews.class.php";

class SendReviewController extends Reviews {
    use getHabitats;
    public function sendReview() {
        if($_SERVER['REQUEST_METHOD'] === "POST") {
           $review = $this->insertReview($_POST['visitorPseudo'], $_POST['visitorReview'], false);
           return $review;
        }  
        $menuHabitats = $this->getHabitats();
        require_once 'views/review.php';
       }
}

