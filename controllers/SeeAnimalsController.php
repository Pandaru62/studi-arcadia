<?php


class SeeAnimalsController extends Animals {
    use getHabitats;
    // public function seeAnimals() {
    //     if (!isset($_SESSION['userRole'])) {
    //         header("Location: ".BASE_URL);
    //     } elseif(!isset($_GET['id'])) {
    //         $animals = $this->getAllAnimals();
    //         $species = $this->getAllSpecies();
    //         $menuHabitats = $this->getHabitats();
    //         if(isset($_GET['filter']))
    //         require "./views/employe/see_animals.php";
    //     } else {
    //         $id = $_POST['speciesSelect'];
    //         $selectedSpecies = $this->getAnimalsBySpecies($id);
    //         require "./views/employe/see_animals.php";
    //         return $selectedSpecies;
    //     }
    // }

    public function seeAnimals() {
        if (!isset($_SESSION['userRole'])) {
            header("Location: ".BASE_URL);
            exit();
        } else {
            $menuHabitats = $this->getHabitats();
            if(isset($_GET['filter'])) {
                $filter = $_GET['filter'];
            } else {
                $filter = 'species';
            }
            switch($filter) {
                case "species":
                    $species = $this->getAllSpecies();
                break;
                case "animalalpha":
                    $animals = $this->getAllAnimals();
                    $species = $this->getAllSpecies();

                break;
                case "animalbyspecies":
                    if(isset($_GET['id'])) {$id = $_GET['id'];} else{$id = 1;}
                    $animals = $this->getAnimalsBySpecies($id);
                    $species = $this->getAllSpecies();
                break;
                default :
                $species = $this->getAllSpecies();
            }
            require "./views/employe/see_animals.php";
            return $filter;
        }
    }

    public function addAnim() {
        if (isset($_SESSION['userRole']) && $_SESSION['userRole'] == 'admin') {
            $species = $this->getAllSpecies();
            require "./views/admin/addanimalform.php";
        } else {
            header("Location: ".BASE_URL);
            exit();
        }
    }
        
    public function editAnim() {      
        if (isset($_SESSION['userRole']) && $_SESSION['userRole'] == 'admin') {
            if(isset($_GET['id'])) {
                $animalId = $_GET['id'];
                $animal = $this->getAllAnimals($animalId);
                $species = $this->getAllSpecies();
                require_once 'views/admin/editanimalform.php';
                return $animal;
            } else {
                header("Location: ".BASE_URL."/seeanimals"); 
                exit();     
            }
        } else {
            header("Location: ".BASE_URL);
            exit();
        }

    }

    public function deleteAnim() {      
        if (isset($_SESSION['userRole']) && $_SESSION['userRole'] == 'admin') {
            if(isset($_GET['id'])) {
                $animalId = $_GET['id'];
                $delete = $this->deleteAnimal($animalId);
                header("Location: ".BASE_URL."/seeanimals?success=animaldeleted");
                exit();
            } else {
                header("Location: ".BASE_URL."/seeanimals");
            }
        } else {
            header("Location: ".BASE_URL);
            exit();
        }

    }

}



