<?php

require_once "checkup.class.php";
class checkUpController extends CheckUp {
    private $vetId;
    private $animalId;
    private $health;
    private $food;
    private $foodQuantity;
    private $date;
    private $opinion;

    public function __construct($vetId = null, $animalId = null, $health = null, $food = null, $foodQuantity = null, $date = null, $opinion = null) {
        $this->vetId = $vetId;
        $this->animalId = $animalId;
        $this->health = $health;
        $this->food = $food;
        $this->foodQuantity = $foodQuantity;
        $this->date = $date;
        $this->opinion = $opinion;
    }

    public function addAnimalCheckUp() {
        if($this->emptyInput() == true) {
            // Empty input
            header("Location: " .BASE_URL."/checkupanimal?error=emptyinput");
            exit();
        }
        $this->setCheckUp($this->vetId, $this->animalId, $this->health, $this->food, $this->foodQuantity, $this->date, $this->opinion);
    }

    private function emptyInput() {
        if (empty($this->animalId) || empty($this->food) || empty($this->foodQuantity) || empty($this->date)) {
            return true;
        } else {
            return false;
        }
    }

}