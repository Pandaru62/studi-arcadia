<?php
// Redirects to the services view


require_once "./models/services.class.php";

class ServicesController extends Services {
    use getHabitats;
    public function services() { 

        require_once './models/timeretrieving.class.php';

        // Retrieve time1 and time2 values from MongoDB
        $timeConfig = TimeRetrieving::getTimeConfig();
        $time1 = $timeConfig['time1'];
        $time2 = $timeConfig['time2'];

        $services = $this->getServices();
        $menuHabitats = $this->getHabitats();
        require_once 'views/services.php';
        return $services;
    }

    public function editService() {      
        if (isset($_SESSION['userRole']) && ($_SESSION['userRole'] == 'admin' || $_SESSION['userRole'] == 'employé')) {
            if(isset($_GET['service'])) {
                $service = $_GET['service'];
                $service = $this->getServiceById($service);
                require_once "./views/employe/edit_service.php";
                return $service;
            } else {
                header("Location: /services");
            }
        } else {
            header("Location: /");
        }

    }

    public function addService() { 
        if (isset($_SESSION['userRole']) && ($_SESSION['userRole'] == 'admin' || $_SESSION['userRole'] == 'employé')) {
        $services = $this->getServices();
        require_once './views/employe/add_service.php';
        return $services;
        } 
        else {
            header("Location: /");
        }
    }

    
    public function deleteServ() {
        
        if(isset($_SESSION) && ($_SESSION["userRole"] == "admin" || $_SESSION["userRole"] == "employé")) {
            if(isset($_GET['id'])) {
            $deletedService = $_GET['id'];
            $delete = $this->deleteService($deletedService);
            header("Location: ".BASE_URL."/services?success=servicedeleted");
            } else {
            header("Location: ".BASE_URL."/services?error=servicedeleted");
            }
        } else {
            header("Location: ".BASE_URL);
        }
    }

}