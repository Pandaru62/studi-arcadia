<?php

// Redirects to the contact view

require_once "./models/reviews.class.php";

class ContactController extends Reviews {
    use getHabitats;
    public function contact() { 
        $menuHabitats = $this->getHabitats();

        // Check for success or error messages
        $great = isset($_SESSION['success']) ? $_SESSION['success'] : null;
        $bad = isset($_SESSION['error']) ? $_SESSION['error'] : null;

        // Clear session variables
        unset($_SESSION['success']);
        unset($_SESSION['error']);

        require_once 'views/contact.php';
    }

}