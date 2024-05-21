<?php

// Redirects to the account editor view for admin
require_once "./models/signup.class.php";
require_once "./models/mongoDBConnection.php";

// require_once "./vendor/mongodb/mongodb/src/Client.php";
// Si problème réactiver le require_once

class DashboardController extends Animals {
use MongoDB;
    public function showDashboard() {
        
        if(isset($_SESSION) && $_SESSION["userRole"] == "admin") {

            // retrieving species data
            $species = $this->getAllSpecies();

            $collection = $this->connectMongoDb();
            
            $viewResults = $collection->find([], [
                'projection' => ['SpeciesId' => 1, 'countNumber' => 1],
                'sort' => ['countNumber' => -1]
            ]);
            
            $documentsArray = [];
            
            foreach ($viewResults as $document) {
                $documentsArray[$document['SpeciesId']] = $document['countNumber'];
            }
            
            foreach ($documentsArray as $speciesId => $countNumber) {
                foreach($species as $specie) {
                    if($specie['id'] == $speciesId) {
                        $speciesByCount[] = [
                            'speciesId' => $speciesId,
                            'speciesCount' => $countNumber,
                            'speciesName' => $specie['name'],
                            'speciesImage' => $specie['image']
                        ];
                    }
                }  
            }

                require_once "./views/admin/dashboard.php";
                return $species;
            
            } else {
                header("Location: ".BASE_URL);
            }
        }
    }

