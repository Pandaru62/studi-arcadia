<?php

require_once "./models/feeding.class.php";
require_once "./models/checkup.class.php";
require_once "./models/animal.class.php";

class AnimalDetailsController extends Feeding {
    use getCheckUp;
    use getAllAnimals;

    
    public function showAnimal() {
        function formatDate($dateString) {
            $date = DateTime::createFromFormat('Y-m-d', $dateString);
            if ($date !== false) {
                $formattedDate = $date->format("d/m/Y");
                return $formattedDate; // Output: 01/05/2024
            } else {
                return "?";
            }
        }

        if (isset($_SESSION['userRole']) && ($_SESSION['userRole'] == 'admin' || $_SESSION['userRole'] == 'employé' || $_SESSION['userRole'] == 'vétérinaire')) {
            $animals = $this->getAllAnimals();

            if (isset($_GET['animal'])) {
                $animalId = $_GET['animal'];
                $animal = $this->getAllAnimals($animalId);
                $lastVetCheckUp = $this->getCheckUpByAnimal($animalId, 1);
                if(empty($lastVetCheckUp)) {
                    $lastVetCheckUp[0]['health'] = '?';
                    $lastVetCheckUp[0]['food'] = '?';
                    $lastVetCheckUp[0]['food_quantity'] = '?';
                    $lastVetCheckUp[0]['date'] = '?';
                    $lastVetCheckUp[0]['opinion'] = '?';
                } else {
                    $lastVetCheckUp[0]["date"] = formatDate($lastVetCheckUp[0]["date"]);
                }

                $lastFeeding = $this->getLastFeeding($animalId);
                if(empty($lastFeeding)) {
                    $lastFeeding[0]['date'] = '?';
                    $lastFeeding[0]['time'] = '?';
                    $lastFeeding[0]['food_quantity'] = '?';
                    $lastFeeding[0]['food'] = '?';
                } else {
                    $lastFeeding[0]["date"] = formatDate($lastFeeding[0]["date"]);
                }

                $allFeeding = $this->getAllFeedingByAnimal($animalId);
                $allCheckUps = $this->getCheckUpByAnimal($animalId);
            }
            require_once "./views/vet/animaldetails.php";
        } else {
            header("Location: ".BASE_URL);
        }

    }

}
