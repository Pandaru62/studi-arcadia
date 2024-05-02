<?php

require_once "./models/feeding.class.php";
require_once "./models/checkup.class.php";
require_once "./models/animal.class.php";

class FeedingPageController extends Feeding {
    use getCheckUp;
    use getAllAnimals;

    public function feedAnimal() {      
        if (isset($_SESSION['userRole']) && $_SESSION['userRole'] == 'admin' || $_SESSION['userRole'] == 'employé') {
            $animals = $this->getAllAnimals();

            if (isset($_GET['id'])) {
                $animalId = $_GET['id'];
                $lastVetCheckUp = $this->getCheckUpByAnimal($animalId, 1);
            }
            require_once "./views/employe/feedAnimalForm.php";
        } else {
            header("Location: ".BASE_URL);
        }

    }
}


