<?php 

require_once "AnimalController.php";
class FeedingController extends AnimalController{
  
    public function showFeeding() { 
        $animal = $this->showAnimal();
        foreach($animal as $ani) {
        $feeding = $this->getLastFeeding($ani["animalId"]);
        $lastFeeding[$ani["animalId"]] = [
            "date" =>$feeding[0]['date'], 
            "time" =>$feeding[0]['time'],
            "food" =>$feeding[0]['food'], 
            "quantity" =>$feeding[0]['quantity']
        ];
        }
        require_once "views/animal.php";
        return $lastFeeding;
    }

}