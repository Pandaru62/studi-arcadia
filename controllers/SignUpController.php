<?php
// Redirects to the signup view for admin

class SignUpController {

    public function signUp() {      
        if (isset($_SESSION['userRole']) && $_SESSION['userRole'] == 'admin') {
            require_once 'views/admin/signup.php';
        } else {
            header("Location: ".BASE_URL);
        }
    }

}