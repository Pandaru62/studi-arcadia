<?php

require_once('Dbh.php');

trait getAllAnimals {
    protected function getAllAnimals(int $id = null) {
        if($id == null) {
        $sql = 'SELECT habitats.image AS habitatImage, habitats.name AS habitatName, animals.id AS animalId, first_name, species_id, animals.image AS animalImage, species.image AS speciesImage, species.name AS speciesName
        FROM animals 
        LEFT JOIN species 
        ON animals.species_id = species.id
        LEFT JOIN habitats
        ON species.habitat_id = habitats.id
        ORDER BY first_name';
        } else {
        $sql = 'SELECT habitats.image AS habitatImage, habitats.name AS habitatName, animals.id AS animalId, first_name, species_id, animals.image AS animalImage, species.image AS speciesImage, species.name AS speciesName
        FROM animals 
        LEFT JOIN species 
        ON animals.species_id = species.id
        LEFT JOIN habitats
        ON species.habitat_id = habitats.id
        WHERE animals.id = :id';
        }
        $stmt = $this->connect()->prepare($sql);
        if($id !== null) {
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        }
        $stmt->execute();
        
        $allAnimals = $stmt->fetchAll();
        return $allAnimals;
    }

    protected function getAllSpecies() {
        $sql = 'SELECT species.*, COUNT(animals.species_id) AS animal_count 
                FROM species 
                LEFT JOIN animals ON species.id = animals.species_id 
                GROUP BY species.id';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        
        $allSpecies = $stmt->fetchAll();
        return $allSpecies;
    }
}
class Animals extends Dbh {
    use getAllAnimals;

    private $speciesId;

    public function __construct($speciesId = null) {
        $this->speciesId = $speciesId;
    }
    
    protected function getAnimalsBySpecies(int $id) {
        $sql = 'SELECT habitats.image AS habitatImage,
        habitats.name AS habitatName,
        animals.id AS animalId,
        first_name,
        species_id,
        animals.image AS animalImage,
        species.image AS speciesImage,
        species.name AS speciesName
        FROM animals
        LEFT JOIN species
        ON animals.species_id = species.id
        LEFT JOIN habitats
        ON species.habitat_id = habitats.id
        WHERE species_id = :id';
        
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        
        $results = $stmt->fetchAll();
        return $results;
    }



    protected function getAllSpecies() {
        $sql = 'SELECT species.*, COUNT(animals.species_id) AS animal_count 
                FROM species 
                LEFT JOIN animals ON species.id = animals.species_id 
                GROUP BY species.id';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        
        $allSpecies = $stmt->fetchAll();
        return $allSpecies;
    }

    protected function getLastFeeding(int $id) {
        $sql = 'SELECT 	feeding.id AS feedingId, animal_id, date, time, food, quantity, first_name, image, species_id
		FROM feeding
        LEFT JOIN animals
        ON feeding.animal_id = animals.id
        WHERE animal_id = :id
        ORDER BY date DESC, time DESC
        LIMIT 1';
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        
        $results = $stmt->fetchAll();
        return $results;
    }

    
    protected function editAnimal($id, $firstName, $speciesId, $image) {
        $sql = 'UPDATE animals SET first_name = :firstname, species_id = :speciesId, image = :image 
                WHERE id = :id';
        $stmt = $this->connect()->prepare($sql);
    
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':firstname', $firstName);
        $stmt->bindParam(':speciesId', $speciesId);
        $stmt->bindParam(':image', $image);
    
        if (!$stmt->execute()) {
            $stmt = null;
            header("Location: " . BASE_URL . "/editanimal?id=".$id."&error=animalnotedited");
            exit();
        }
    
        $stmt = null;
    }
    
    
    protected function setAnimal($firstName, $speciesId, $image) {
        $sql = 'INSERT INTO animals (first_name, species_id, image)
        VALUES (?, ?, ?)';
        $stmt = $this->connect()->prepare($sql);

        if(!$stmt->execute(array($firstName, $speciesId, $image))) {
            $stmt = null;
            header("Location: " .BASE_URL."/addhabitat?error=habitatnotadded");
            exit();
        }

        $stmt = null;
    
    }

    protected function deleteAnimal(int $id) {
        $sql = 'DELETE FROM animals 
                WHERE `animals`.`id` = :id';
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $animalDeleted = $stmt->fetch();
        return $animalDeleted;
    }

    
     
}