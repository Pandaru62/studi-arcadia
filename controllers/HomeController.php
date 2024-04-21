<?php

// Redirects to the homepage view

class HomeController {

    public function index() { 
        require_once 'views/homepage.php';
    }

}