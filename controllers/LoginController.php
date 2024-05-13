<?php

// Redirects to the login view
class LoginController extends Habitats {

    public function login() { 
        $menuHabitats = $this->getHabitats();

        // Check for success or error messages
        $great = isset($_SESSION['success']) ? $_SESSION['success'] : null;
        $bad = isset($_SESSION['error']) ? $_SESSION['error'] : null;
    
        // Clear session variables
        unset($_SESSION['success']);
        unset($_SESSION['error']);

        require_once 'views/login.php';
    }
}

