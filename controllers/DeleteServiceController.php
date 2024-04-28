<?php
// Redirects to the account editor view for admin
require_once "./models/services.class.php";

class DeleteServiceController extends Services {

    public function deleteServ() {      
        
        if(isset($_SESSION) && isset($_GET['id']) && $_SESSION["userRole"] == "admin" || $_SESSION["userRole"] == "employé") {
            $deletedService = $_GET['id'];
            $delete = $this->deleteService($deletedService);
            header("Location: ".BASE_URL."/services?success=servicedeleted");
        } elseif(!isset($_GET['id'])) {
            header("Location: ".BASE_URL);
        } else {
            header("Location: ".BASE_URL."/services?error=servicedeleted");
        }
        }
}

