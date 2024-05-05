<?php

// Redirects to the showHabitat view: enables to see one habitat depending on its ID

require_once "./models/habitat.class.php";
require_once "./models/habitatcomment.class.php";

class ShowHabitatController extends Habitats {
    use getLastHabComment;
    public function showHabitat() {
        $id = $_GET["habitat"];
        $habitat = $this->getHabitatsById($id);
        $species = $this->getSpeciesByHabitat($id);
        $menuHabitats = $this->getHabitats();
        $lastComments = $this->getLastHabitatComment($id, 1);
        if(!isset($habitat[0]['id'])) {
            header("Location: " .BASE_URL."/404");
            } else {
                require_once "views/showHabitat.php";
            }

        return $habitat;
        }

}

