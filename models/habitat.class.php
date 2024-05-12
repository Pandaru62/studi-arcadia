<?php

require_once('Dbh.php');

trait getHabitats {
    protected function getHabitats(int $limit = null) {
        $sql = 'SELECT * FROM habitats
                ORDER BY id ASC';
        if ($limit) {
            $sql .= ' LIMIT :limit';
        }
        $stmt = $this->connect()->prepare($sql);
        if ($limit) {
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            }
        $stmt->execute();
        
        $habitats = $stmt->fetchAll();
        return $habitats;
    }

    protected function countReview() {
        $sql = 'SELECT COUNT(*) FROM reviews
                WHERE `reviews`.`isChecked` = 0';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $unCheckedReview = $stmt->fetchAll();
        return $unCheckedReview;
    }

    
}

class Habitats extends Dbh {
use getHabitats;
    protected function getHabitatsbyId(int $id) {
            $sql = 'SELECT * FROM habitats WHERE id = :id';
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            
            $results = $stmt->fetchAll();
            return $results;
        }


    protected function getSpeciesByHabitat (int $id) {
            $sql = 'SELECT * FROM species
                    WHERE habitat_id = :id';
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            
            $species = $stmt->fetchAll();
            return $species;

            }

    protected function getAllSpecies () {
        $sql = 'SELECT * FROM species
                ORDER BY habitat_id';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        
        $allSpecies = $stmt->fetchAll();
        return $allSpecies;

        }

        protected function editHabitat($id, $name, $image, $description) {
            $sql = 'UPDATE habitats SET name = :name, image = :image, image = :image, description = :description 
                    WHERE id = :id';
            $stmt = $this->connect()->prepare($sql);
        
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':image', $image);
            $stmt->bindParam(':description', $description);
        
            if (!$stmt->execute()) {
                $stmt = null;
                header("Location: " . BASE_URL . "/edithabitat?id=".$id."&error=habitatnotedited");
                exit();
            }
        
            $stmt = null;
        }
        
        
        protected function setHabitat ($name, $image, $description) {
            $sql = 'INSERT INTO habitats (name, image, description)
            VALUES (?, ?, ?)';
            $stmt = $this->connect()->prepare($sql);
    
            if(!$stmt->execute(array($name, $image, $description))) {
                $stmt = null;
                header("Location: " .BASE_URL."/addhabitat?error=habitatnotadded");
                exit();
            }
    
            $stmt = null;
        
        }
    
        protected function deleteHabitat(int $id) {
            $sql = 'DELETE FROM habitats 
                    WHERE `habitats`.`id` = :id';
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $habitatDeleted = $stmt->fetch();
            return $habitatDeleted;
        }

}