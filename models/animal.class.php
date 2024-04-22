<?php

require_once('Dbh.php');

class Animals extends Dbh {
    
    protected function getAnimalsBySpecies(int $id) {
        $sql = 'SELECT habitats.image AS habitatImage, habitats.name AS habitatName, animals.id AS animalId, first_name, species_id, animals.image AS animalImage, species.image AS speciesImage, species.name AS speciesName
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
     
}