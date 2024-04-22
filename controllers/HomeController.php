<?php

// Redirects to the homepage view
require_once("./models/reviews.class.php");
require_once("./models/services.class.php");

class HomeController extends Reviews {
    use returnServices;

    public function index() { 
        $reviews = $this->getLastReviews(true, 1);
        $services = $this->getServices(3);
        require_once 'views/homepage.php';
        return $reviews;
    }

}