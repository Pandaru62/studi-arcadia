<?php
require_once "../models/animal.class.php";

    $animal = new Animals();

    if (isset($_POST['selectSpecies'])) {
    $id = $_POST['speciesSelect'];

    $selectedSpecies = $animal->getAnimalsBySpecies($id);
    header("Location : /seeanimals");

}