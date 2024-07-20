<?php

class SeeFeedingController extends Feeding {
    use getAllAnimals;
    
    public function seeFeeding () {
        if (isset($_SESSION['userRole'])) {
            // when a user is logged in

            // retrieve the names of the animals for the select in the search bar
            $animals = $this->getAllAnimals();
            $species = $this->getAllSpecies();
            $feedings = $this->getAllFeeding();

            $feedings = json_encode($feedings);
            require_once './views/vet/seefeedingdetails.php';
        } else {
            header("Location: " . BASE_URL);
        }
    }
    
    
    
}
    
        

            
