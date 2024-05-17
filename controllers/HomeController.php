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
        $menuHabitats = $this->getHabitats(3);
        $unCheckedReview = $this->countReview();
        $lastCheckedReviews = $this->getLastReviews(1, 5);
        $countUncheckedReviews = $unCheckedReview[0]["COUNT(*)"];
        foreach($menuHabitats as $hab) {
            $species[$hab['id']] = $this->getSpeciesByHabitat($hab["id"]);
        }

        // Check for success or error messages
        $great = isset($_SESSION['success']) ? $_SESSION['success'] : null;
        $bad = isset($_SESSION['error']) ? $_SESSION['error'] : null;

        // Clear session variables
        unset($_SESSION['success']);
        unset($_SESSION['error']);

        require_once 'views/homepage.php';
        return $reviews;
    }

}