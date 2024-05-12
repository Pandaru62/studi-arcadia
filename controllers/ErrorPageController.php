<?php

// Redirects to the 404 page

require_once "./models/habitat.class.php";

class ErrorPageController extends Habitats {
    public function displayErrorPage() { 
        $menuHabitats = $this->getHabitats();
        require_once 'views/404.php';
    }

}