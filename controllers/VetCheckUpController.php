<?php
// Redirects to the check up view for vets

require_once "./models/animal.class.php";

class VetCheckUpController extends Animals {
    public function addCheckUp() { 
        if (isset($_SESSION['userRole']) && $_SESSION['userRole'] == 'admin' || $_SESSION['userRole'] == 'vétérinaire') {
            if(isset($_GET['animal'])) {
                $animalCheckId = $_GET['animal'];
            }
        $animals = $this->getAllAnimals();
        require_once './views/vet/addCheckUpForm.php';
        } 
        else {
            header("Location: ".BASE_URL);
        }
    }

    public function seeCheckUp() { 
        if (isset($_SESSION['userRole'])) {
        // $services = $this->getServices();
        require_once './views/seecheckup.php';
        } 
        else {
            header("Location: ".BASE_URL);
        }
    }
}

