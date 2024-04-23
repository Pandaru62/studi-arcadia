<?php
// Redirects to the services view


require_once "./models/services.class.php";

class ServicesController extends Services {
    use getHabitats;
    public function services() { 
        $services = $this->getServices();
        $menuHabitats = $this->getHabitats();
        require_once 'views/services.php';
        return $services;
    }

}