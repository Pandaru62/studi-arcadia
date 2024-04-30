<?php

require_once "habitat.class.php";
class AnimalContr extends Animals {
    private $firstName;
    private $speciesId;
    private $image;

    public function __construct($firstName = null, $speciesId = null, $image = null) {
        $this->firstName = $firstName;
        $this->speciesId = $speciesId;
        $this->image = $image;
    }

    public function updateAnimal($id) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if($this->emptyInput() == true) {
            // Empty input
            header("Location: " .BASE_URL."/editanimal?id=".$id."&error=emptyinput");
            exit();
        }

        $this->editAnimal($id, $this->firstName, $this->speciesId, $this->image);
    }
}

    public function addAnimal() {
        if($this->emptyInput() == true) {
            // Empty input
            header("Location: " .BASE_URL."/addanimal?error=emptyinput");
            exit();
        }
        $this->setAnimal($this->firstName, $this->speciesId, $this->image);
    }

    private function emptyInput() {
        if (empty($this->firstName) || empty($this->speciesId)) {
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