<?php
// Redirects to the check up view for vets

require_once "./models/animal.class.php";
require_once "./models/checkup.class.php";


class VetCheckUpController extends CheckUp {
    use getAllAnimals;
    public function addCheckUp() {
        if (isset($_SESSION['userRole']) && ($_SESSION['userRole'] == 'admin' || $_SESSION['userRole'] == 'vétérinaire')) {
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
            // when a user is logged in

            // retrieve the names of the animals for the select in the search bar
            $animals = $this->getAllAnimals();
            $species = $this->getAllSpecies();
            $checkups = $this->getAllCheckUpNew();

            $checkups = json_encode($checkups);
            require_once './views/seecheckup.php';
        } else {
            header("Location: " . BASE_URL);
        }
    }
} // end seeCheckUp


