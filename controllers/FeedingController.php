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
            $feedingDate = formatDate($feeding[0]['date']);
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

        }




        function count_visitor($speciesId) {
            // Connect to MongoDB
            $uri = 'mongodb://root:root@localhost:8080';
            $client = new MongoDB\Client($uri);
        
            // Select database and collection
            $collection = $client->selectDatabase('arcadia')->selectCollection('countVisitors');
        
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
        

        // previous function counting visitors

        function count_visitor2($speciesId) {
            if (!isset($_SESSION['visited'][$speciesId])) {
                $_SESSION['visited'][$speciesId] = true;

                // Increment the count in database or file
                $count_file = 'visitor_count_' . $speciesId . '.txt';
                    
                if (!file_exists($count_file)) {
                    // Create the count file if it doesn't exist
                    file_put_contents($count_file, 0);
                }

                $count = file_get_contents($count_file);
                $count++;
                file_put_contents($count_file, $count);

                return $count;
            } else {
                // Count already incremented, just return it
                $count_file = 'visitor_count_' . $speciesId . '.txt';
                return file_get_contents($count_file);
            }
        }

        count_visitor($ani['species_id']);

        require_once "views/animal.php";
    }
    }
}
