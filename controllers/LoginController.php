<?php

// Redirects to the login view

class LoginController extends Habitats {

    public function login() { 
        $menuHabitats = $this->getHabitats();
        require_once 'views/login.php';
    }

}