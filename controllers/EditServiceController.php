<?php

class EditServiceController extends Services {

    public function editService() {      
        if (isset($_SESSION['userRole']) && $_SESSION['userRole'] == 'admin' || $_SESSION['userRole'] == 'employé' && isset($_GET['service'])) {
            $service = $_GET['service'];
            $service = $this->getServiceById($service);
            require_once "./views/employe/edit_service.php";
            return $service;
        } else {
            header("Location: ".BASE_URL);
        }

    }
}


