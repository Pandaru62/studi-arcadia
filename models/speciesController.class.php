<?php

require_once "habitat.class.php";
class SpeciesContr extends Species {

    private $speciesName;
    private $speciesImage;
    private $speciesHabitatId;


    public function __construct($speciesName = null, $speciesImage = null, $speciesHabitatId = null) {
        $this->speciesName = $speciesName;
        $this->speciesImage = $speciesImage;
        $this->speciesHabitatId = $speciesHabitatId;
    }

    public function updateSpecies($id) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if($this->emptyInput() == true) {
            // Empty input
            header("Location: " .BASE_URL."/editspecies?id=".$id."&error=emptyinput");
            exit();
        }

        $this->editSpecies($id, $this->speciesName, $this->speciesImage, $this->speciesHabitatId);
    }
}

    public function addSpecies() {
        if($this->emptyInput() == true) {
            // Empty input
            header("Location: " .BASE_URL."/addanimal?error=emptyinput");
            exit();
        }
        $this->setSpecies($this->speciesName, $this->speciesImage, $this->speciesHabitatId);
    }

    private function emptyInput() {
        if (empty($this->speciesName) || empty($this->speciesHabitatId)) {
            return true;
        } else {
            return false;
        }
    }

    protected function getHabitatBySpecies(int $id) {
        $sql = 'SELECT species.habitat_id AS habitatId, species.id AS speciesId, species.name AS speciesName, habitats.name AS habitatName, species.image AS speciesImage, habitats.image AS habitatImage,  description FROM species 
        LEFT JOIN habitats
        ON species.habitat_id = habitats.id
        WHERE species.id = :id';
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        
        $results = $stmt->fetchAll();
        return $results;
    }

    
}