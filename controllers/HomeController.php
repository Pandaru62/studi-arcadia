<?php

// Redirects to the homepage view
require ("./models/reviews.class.php");
require ("./models/services.class.php");
require ("./models/habitat.class.php");

class HomeController extends Reviews {
    use returnServices;
    use getHabitats;

    public function index() { 
        $reviews = $this->getLastReviews(true, 1);
        $services = $this->getServices(3);
        $menuHabitats = $this->getHabitats();
        require_once 'views/homepage.php';
        return $reviews;
    }

}