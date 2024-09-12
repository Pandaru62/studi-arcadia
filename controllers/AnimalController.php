<?php

// Redirects to the Animal view

require_once "./models/animal.class.php";

class AnimalController extends Animals {
    use getHabitats;

    public function showAnimal() {
        $id = $_GET["species"];
        if ($id === null) {
            header('Location: /404');
        }

        $menuHabitats = $this->getHabitats();
        $animal = $this->getAnimalsBySpecies($id);
        return $animal;
    }


}
    
