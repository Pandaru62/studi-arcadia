<?php
// Redirects to the services view


require_once "./models/services.class.php";

class addServicesController extends Services {
    public function addService() { 
        if (isset($_SESSION['userRole']) && $_SESSION['userRole'] == 'admin' || $_SESSION['userRole'] == 'employé') {
        $services = $this->getServices();
        require_once './views/employe/add_service.php';
        return $services;
        } 
        else {
            header("Location: ".BASE_URL);
        }
    }
}

