<?php

require_once "AnimalController.php";
require_once "./models/checkup.class.php";

class FeedingController extends AnimalController {
    use getCheckUp; 
    public function showAnimalPage() {
        
        function formatDate($dateString) {
            $date = DateTime::createFromFormat('Y-m-d', $dateString);
            if ($date !== false) {
                $formattedDate = $date->format("d/m/Y");
                return $formattedDate; // Output: 01/05/2024
            } else {
                return "?";
            }
        }
        $animal = $this->showAnimal();
        $menuHabitats = $this->getHabitats();

        if(empty($animal) === true) {
          require_once "views/404.php";
        } else {

            foreach($animal as $ani) {
                $feeding = $this->getLastFeeding($ani["animalId"]);
                $checkUp = $this->getCheckUpBySpecies($ani["animalId"]);

                // Replace NULL values with "?"
                $feedingDate = $feeding[0]['date'] ?? "?";
                if($feedingDate !== "?") {$feedingDate = formatDate($feedingDate);};
                $feedingTime = $feeding[0]['time'] ?? "?";
                $feedingFood = $feeding[0]['food'] ?? "?";
                $feedingQuantity = $feeding[0]['quantity'] ?? "?";

                $checkHealth = $checkUp[0]['health'] ?? "?";
                $checkFood = $checkUp[0]['food'] ?? "?";
                $checkDate = $checkUp[0]['date'] ?? "?";
                if($checkDate !== "?") {$checkDate = formatDate($checkDate);};
                $checkFoodQuantity = $checkUp[0]['food_quantity'] ?? "?";
                $checkOpinion = $checkUp[0]['opinion'] ?? "?";

                $lastFeeding[$ani["animalId"]] = [
                    "date" => $feedingDate,
                    "time" => $feedingTime,
                    "food" => $feedingFood,
                    "quantity" => $feedingQuantity
                ];

                
                $lastCheckUp[$ani["animalId"]] = [
                    "health" => $checkHealth,
                    "food" => $checkFood,
                    "date" => $checkDate,
                    "quantity" => $checkFoodQuantity,
                    "opinion" => $checkOpinion
                ];
            






        function countVisitor($speciesId) {
            // Connect to MongoDB

                $uri = getenv('MONGODB_URI');
                if (!$uri) {
                    $uri = MONGODB_URI;
                }
                
            $client = new MongoDB\Client($uri);
        
            // Select database and collection
            $collection = $client->selectDatabase('Arcadia')->selectCollection('countVisitors');
        
            // Find the document with the given speciesId
            $document = $collection->findOne(['SpeciesId' => $speciesId]);
        
            if (!isset($_SESSION['visited'][$speciesId])) {
                $_SESSION['visited'][$speciesId] = true;
                if ($document) {
                    // If document exists, update the count
                    $newCount = $document['countNumber'] + 1;
                    $collection->updateOne(['SpeciesId' => $speciesId], ['$set' => ['countNumber' => $newCount]]);
                } else {
                    // If document doesn't exist, insert a new one
                    $collection->insertOne(['SpeciesId' => $speciesId, 'countNumber' => 1]);
                }
            }
        }
              
            countVisitor($ani['species_id']);

            require_once "views/animal.php";

        }
    }
}
    }
