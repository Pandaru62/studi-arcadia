<?php
// Redirects to the services view


require_once "./models/services.class.php";

class ServicesController extends Services {

    public function services() { 
        $services = $this->getServices();        
        require_once 'views/services.php';
        return $services;
    }

}