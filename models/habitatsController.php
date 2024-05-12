<?php

require_once "habitat.class.php";
class HabitatsContr extends Habitats {
    private $habitatName;
    private $habitatImage;
    private $habitatDescription;

    public function __construct($habitatName = null, $habitatImage = null, $habitatDescription = null) {
        $this->habitatName = $habitatName;
        $this->habitatImage = $habitatImage;
        $this->habitatDescription = $habitatDescription;
    }

    public function updateHabitat($id) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if($this->emptyInput() == true) {
            // Empty input
            header("Location: " .BASE_URL."/edithabitat?error=emptyinput");
            exit();
        }

        $this->editHabitat($id, $this->habitatName, $this->habitatImage, $this->habitatDescription);
    }
}

    public function addHabitat() {
        if($this->emptyInput() == true) {
            // Empty input
            header("Location: " .BASE_URL."/addhabitat?error=emptyinput");
            exit();
        }
        $this->setHabitat($this->habitatName, $this->habitatImage, $this->habitatDescription);
    }

    private function emptyInput() {
        if (empty($this->habitatName) || empty($this->habitatDescription)) {
            return true;
        } else {
            return false;
        }
    }
}