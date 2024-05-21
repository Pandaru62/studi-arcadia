<?php
// Redirects to the signup view for admin

class SignUpController {

    public function signUp() {
        if (isset($_SESSION['userRole']) && $_SESSION['userRole'] == 'admin') {
            
            // Check for success or error messages
            $great = isset($_SESSION['success']) ? $_SESSION['success'] : null;
            $bad = isset($_SESSION['error']) ? $_SESSION['error'] : null;

            // Clear session variables
            unset($_SESSION['success']);
            unset($_SESSION['error']);

            require_once 'views/admin/signup.php';
        } else {
            header("Location: ".BASE_URL);
        }
    }

}