<?php

require_once('./models/habitat.class.php');
require_once ('./models/habitatcomment.class.php');

class HabitatsView extends Habitats {
use getLastHabComment;
public function showHabitats() {
    $habitats = $this->getHabitats();
    return ($habitats);
}

public function showSpecies() {
    $species = $this->getAllSpecies();
    return ($species);
}

}