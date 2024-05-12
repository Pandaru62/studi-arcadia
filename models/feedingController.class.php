<?php

require_once "feeding.class.php";
class FeedingContr extends Feeding {
    private $animal_id;
    private $date;
    private $time;
    private $food;
    private $foodQuantity;


    public function __construct($animal_id = null, $date = null, $time = null, $food = null, $foodQuantity = null) {
        $this->animal_id = $animal_id;
        $this->date = $date;
        $this->time = $time;
        $this->food = $food;
        $this->foodQuantity = $foodQuantity;
    }

    public function addFeeding() {
        if($this->emptyInput() == true) {
            // Empty input
            header("Location: " .BASE_URL."/feeding?error=emptyinput");
            exit();
        }
        $this->setFeeding($this->animal_id, $this->date, $this->time, $this->food, $this->foodQuantity);
    }

    private function emptyInput() {
        if (empty($this->animal_id) || empty($this->date) || empty($this->time) || empty($this->food) || empty($this->foodQuantity)) {
            return true;
        } else {
            return false;
        }
    }

}