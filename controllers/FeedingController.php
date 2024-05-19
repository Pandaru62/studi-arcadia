<?php

require_once "AnimalController.php";
require_once "./models/checkup.class.php";

class FeedingController extends AnimalController {
    use getCheckUp; 
    public function showAnimalPage() {
        
        function formatDate($dateString) {
            $date = DateTime::createFromFormat('Y-m-d', $dateString);
            if ($date !== false) {
                return $date->format("d/m/Y");
            } else {
                return "?";
            }
        }

        $animal = $this->showAnimal();
        $menuHabitats = $this->getHabitats();

        // Assuming $animal is an array of animals
        if (empty($animal) === true) {
            require_once "views/404.php";
        } else {
            $lastFeeding = [];
            $lastCheckUp = [];
            
            foreach ($animal as $ani) {
                $feedings = $this->getLastFeeding($ani["animalId"]);
                $checkUps = $this->getCheckUpBySpecies($ani["animalId"]);
                
                // Initialize default values
                $feedingDate = "?";
                $feedingTime = "?";
                $feedingFood = "?";
                $feedingQuantity = "?";
                
                if (!empty($feedings)) {
                    $feeding = $feedings[0]; 
                    $feedingDate = $feeding['date'] ?? "?";
                    if ($feedingDate !== "?") {
                        $feedingDate = formatDate($feedingDate);
                    }
                    $feedingTime = $feeding['time'] ?? "?";
                    $feedingFood = $feeding['food'] ?? "?";
                    $feedingQuantity = $feeding['quantity'] ?? "?";
                }

                // Initialize default values
                $checkHealth = "?";
                $checkFood = "?";
                $checkDate = "?";
                $checkFoodQuantity = "?";
                $checkOpinion = "?";

                if (!empty($checkUps)) {
                    $checkUp = $checkUps[0]; // Assuming you want the most recent checkup
                    $checkHealth = $checkUp['health'] ?? "?";
                    $checkFood = $checkUp['food'] ?? "?";
                    $checkDate = $checkUp['date'] ?? "?";
                    if ($checkDate !== "?") {
                        $checkDate = formatDate($checkDate);
                    }
                    $checkFoodQuantity = $checkUp['food_quantity'] ?? "?";
                    $checkOpinion = $checkUp['opinion'] ?? "?";
                }

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

            
            }
            
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
