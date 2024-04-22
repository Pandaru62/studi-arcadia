<?php

// Redirects to the Animal view

require_once "./models/animal.class.php";

class AnimalController extends Animals {

    public function showAnimal() { 
        $id = $_GET["species"];
        $animal = $this->getAnimalsBySpecies($id);
        return $animal;
    }

}