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

}