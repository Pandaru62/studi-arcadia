<?php 
class LogoutController {
    public function logout() { 
            session_start();
            if (session_destroy()){
            $_SESSION = array();
            header('location: ' .BASE_URL.'/login');
            exit();
        } else {
            error_log("Session destruction failed");
            header('location: ' . BASE_URL . '/404');
            exit();
        }
    }
}