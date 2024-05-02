<?php


class SeeAnimalsController extends Animals {
    use getHabitats;
    public function seeAnimals() {
        if (!isset($_SESSION['userRole'])) {
            header("Location: ".BASE_URL);
        } elseif(!isset($_GET['id'])) {
            $animals = $this->getAllAnimals();
            $species = $this->getAllSpecies();
            $menuHabitats = $this->getHabitats();
            require "./views/employe/see_animals.php";
        } else {
            $id = $_POST['speciesSelect'];
            $selectedSpecies = $this->getAnimalsBySpecies($id);
            require "./views/employe/see_animals.php";
            return $selectedSpecies;
        }
    }

    public function addAnim() {
        if (isset($_SESSION['userRole']) && $_SESSION['userRole'] == 'admin') {
            $species = $this->getAllSpecies();
            require "./views/admin/addanimalform.php";
        } else {
            header("Location: ".BASE_URL);
        }
    }
        
    public function editAnim() {      
        if (isset($_SESSION['userRole']) && $_SESSION['userRole'] == 'admin' && isset($_GET['id'])) {
            $animalId = $_GET['id'];
            $animal = $this->getAllAnimals($animalId);
            $species = $this->getAllSpecies();
            require_once 'views/admin/editanimalform.php';
            return $animal;
        } else {
            header("Location: ".BASE_URL);
        }

    }

    public function deleteAnim() {      
        if (isset($_SESSION['userRole']) && $_SESSION['userRole'] == 'admin' && isset($_GET['id'])) {
            $animalId = $_GET['id'];
            $delete = $this->deleteAnimal($animalId);
            header("Location: ".BASE_URL."/seeanimals?success=animaldeleted");
        } elseif(!isset($_GET['id'])) {
            header("Location: ".BASE_URL);
        } else {
            header("Location: ".BASE_URL."/seeanimals?error=animalnotdeleted");
        }

    }

}



