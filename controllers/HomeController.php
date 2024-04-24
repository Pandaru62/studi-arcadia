<?php

// Redirects to the homepage view
require ("./models/reviews.class.php");
require ("./models/services.class.php");
require ("./models/habitat.class.php");

class HomeController extends Habitats {
    use returnServices;
    use getLastReview;

    public function index() { 
        $reviews = $this->getLastReviews(true, 1);
        $services = $this->getServices(3);
        $menuHabitats = $this->getHabitats();
        foreach($menuHabitats as $hab) {
            $species[$hab['id']] = $this->getSpeciesByHabitat($hab["id"]);
        }
        require_once 'views/homepage.php';
        return $reviews;
    }

}