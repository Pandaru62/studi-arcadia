<?php

require_once "./models/species.class.php";

class SeeSpeciesController extends Species {
    use getHabitats;
    // public function seeSpec() {
    //     if (!isset($_SESSION['userRole']) || $_SESSION['userRole'] !== 'admin') {
    //         header("Location: ".BASE_URL);
    //     } elseif(!isset($_GET['id'])) {
    //         $animals = $this->getAllAnimals();
    //         $species = $this->getAllSpecies();
    //         $menuHabitats = $this->getHabitats();
    //         require "./views/employe/see_animals.php";
    //     } else {
    //         $id = $_POST['speciesSelect'];
    //         $selectedSpecies = $this->getAnimalsBySpecies($id);
    //         require "./views/employe/see_animals.php";
    //         return $selectedSpecies;
    //     }
    // }

    public function addSpec() {
        if (isset($_SESSION['userRole']) && $_SESSION['userRole'] == 'admin') {
            $habitats = $this->getHabitats();
            require "./views/admin/addspeciesform.php";
        } else {
            header("Location: ".BASE_URL);
        }
    }
        
    public function editSpec() {      
        if (isset($_SESSION['userRole']) && $_SESSION['userRole'] == 'admin' && isset($_GET['id'])) {
            $speciesId = $_GET['id'];
            $habitats = $this->getHabitats();
            $specie = $this->getAllSpecies($speciesId);
            if(!isset($specie[0]['id'])) {
                header("Location: " .BASE_URL."/404");
                } else {
            require_once 'views/admin/editspecieform.php';
            return $specie;}
        } else {
            header("Location: ".BASE_URL);
        }
    }

    public function deleteSpec() {      
        if (isset($_SESSION['userRole']) && $_SESSION['userRole'] == 'admin' && isset($_GET['id'])) {
            $specieId = $_GET['id'];
            $species = $this->getAllSpecies();
            
            $delete = $this->deleteSpecies($specieId);
            header("Location: ".BASE_URL."/seeanimals?success=animaldeleted");
                
        } elseif(!isset($_GET['id'])) {
            header("Location: ".BASE_URL);
        } else {
            header("Location: ".BASE_URL."/seeanimals?error=animalnotdeleted");
        }

    }

}



