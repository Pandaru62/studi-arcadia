<?php

// Redirects to the showHabitat view: enables to see one habitat depending on its ID

require_once "./models/habitat.class.php";
class ShowHabitatController extends Habitats {

    public function showHabitat() {
        $id = $_GET["habitat"];
        $habitat = $this->getHabitatsById($id);
        $species = $this->getSpeciesByHabitat($id);
        require_once "views/showHabitat.php";
        return $habitat;
        }

}
