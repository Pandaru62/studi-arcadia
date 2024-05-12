<?php

require_once('Dbh.php');

class Species extends Dbh {

    protected function getAllSpecies(int $id = null) {
        $sql = 'SELECT * FROM species';
        if($id !== null) {
            $sql .= ' WHERE species.id = :id';
        }
        $stmt = $this->connect()->prepare($sql);
        if($id !== null ) {
            $stmt->bindParam(':id', $id);
        }

        $stmt->execute();
        
        $allSpecies = $stmt->fetchAll();
        return $allSpecies;
    }
    
    protected function editSpecies($id, $speciesName, $speciesImage, $speciesHabitatId) {
        $sql = 'UPDATE species SET name = :speciesName, image = :speciesImage, habitat_id = :speciesHabitatId 
                WHERE species.id = :id';
        $stmt = $this->connect()->prepare($sql);
    
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':speciesName', $speciesName);
        $stmt->bindParam(':speciesImage', $speciesImage);
        $stmt->bindParam(':speciesHabitatId', $speciesHabitatId);
    
        if (!$stmt->execute()) {
            $stmt = null;
            header("Location: " . BASE_URL . "/addspecies?id=".$id."&error=speciesnotedited");
            exit();
        }
    
        $stmt = null;
    }
    
    
    protected function setSpecies($speciesName, $speciesImage, $speciesHabitatId) {
        $sql = 'INSERT INTO species (name, image, habitat_id)
        VALUES (?, ?, ?)';
        $stmt = $this->connect()->prepare($sql);

        if(!$stmt->execute(array($speciesName, $speciesImage, $speciesHabitatId))) {
            $stmt = null;
            header("Location: " .BASE_URL."/addspecies?error=speciesnotadded");
            exit();
        }

        $stmt = null;
    
    }

    protected function deleteSpecies(int $id) {
        $sql = 'DELETE FROM species 
                WHERE `species`.`id` = :id';
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $speciesDeleted = $stmt->fetch();
        return $speciesDeleted;
    }

    
     
}