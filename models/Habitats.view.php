<?php

require_once('./models/habitat.class.php');

class HabitatsView extends Habitats {

public function showHabitats() {
    $habitats = $this->getHabitats();
    return ($habitats);
}

public function showSpecies() {
    $species = $this->getAllSpecies();
    return ($species);
}


}