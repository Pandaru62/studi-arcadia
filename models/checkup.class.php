<?php

require_once('Dbh.php');

trait getCheckUp {
    public function getCheckUpByAnimal(int $id, int $limit = null) {
        $sql = 'SELECT reports.*, animals.first_name AS animalFirstName, species_id, image, user.first_name AS userFirstName, user.last_name AS userLastName
        FROM reports 
        LEFT JOIN animals 
        ON animals.id = reports.animal_id
        LEFT JOIN user
        ON reports.vet_id = user.id
        WHERE animals.id = :id';
        if($limit !== null) {
            $sql .= ' LIMIT :limit';
        }
        $stmt = $this->connect()->prepare($sql);
        if($limit !== null) {
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        }
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        
        $results = $stmt->fetchAll();
        return $results;
    }

    public function getCheckUpBySpecies(int $id, int $limit = null) {
        $sql = 'SELECT reports.*, animals.first_name AS animalFirstName, species_id, image, user.first_name AS userFirstName, user.last_name AS userLastName
        FROM reports 
        LEFT JOIN animals 
        ON animals.id = reports.animal_id
        LEFT JOIN user
        ON reports.vet_id = user.id
        WHERE species_id = :id';
        if($limit !== null) {
            $sql .= 'LIMIT :limit';
        }
        $stmt = $this->connect()->prepare($sql);
        if($limit !== null) {
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        }
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        
        $results = $stmt->fetchAll();
        return $results;
    }

}
class CheckUp extends Dbh {
    use getCheckUp;

   
    protected function setCheckUp($vetId, $animalId, $health, $food, $foodQuantity, $date, $opinion) {
        $sql = 'INSERT INTO reports (vet_id, animal_id, health, food, food_quantity, date, opinion)
        VALUES (?, ?, ?, ?, ?, ?, ?)';
        $stmt = $this->connect()->prepare($sql);

        if(!$stmt->execute(array($vetId, $animalId, $health, $food, $foodQuantity, $date, $opinion))) {
            $stmt = null;
            header("Location: " .BASE_URL."/checkupanimal?error=checkuperror");
            exit();
        }

        $stmt = null;
    
    }
     
}