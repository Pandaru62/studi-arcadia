<?php 
class LogoutController {
    public function logout() { 
        session_start();
        session_unset();
        session_destroy();
        header('location: ' .BASE_URL);
    }
}