<?php 

require_once "AnimalController.php";

class FeedingController extends AnimalController {
    public function showFeeding() { 
        $animal = $this->showAnimal();
        $menuHabitats = $this->getHabitats();
        $lastFeeding = [];

        // var_dump(empty($animal));
        if(empty($animal) === true) {
          require_once "views/404.php";
        } else {

        foreach($animal as $ani) {
            $feeding = $this->getLastFeeding($ani["animalId"]);

            // Replace NULL values with "?"
            $date = $feeding[0]['date'] ?? "?";
            $time = $feeding[0]['time'] ?? "?";
            $food = $feeding[0]['food'] ?? "?";
            $quantity = $feeding[0]['quantity'] ?? "?";

            $lastFeeding[$ani["animalId"]] = [
                "date" => $date,
                "time" => $time,
                "food" => $food,
                "quantity" => $quantity
            ];
        }
        
        require_once "views/animal.php";
        return $lastFeeding;
    }
    }
}
