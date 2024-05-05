<?php

require_once "Dbh.php";

class Feeding extends Dbh {

        protected function setFeeding($animal_id, $date, $time, $food, $foodQuantity) {
                $sql = 'INSERT INTO feeding (animal_id, date, time, food, quantity)
                VALUES (?, ?, ?, ?, ?)';
                $stmt = $this->connect()->prepare($sql);
        
                if(!$stmt->execute(array($animal_id, $date, $time, $food, $foodQuantity))) {
                    $stmt = null;
                    header("Location: " .BASE_URL."/feeding?error=feedingnotadded");
                    exit();
                }
        
                $stmt = null;
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

        
            protected function getAllFeedingByAnimal(int $id) {
                $sql = 'SELECT 	feeding.id AS feedingId, animal_id, date, time, food, quantity, first_name, image, species_id
                        FROM feeding
                LEFT JOIN animals
                ON feeding.animal_id = animals.id
                WHERE animal_id = :id
                ORDER BY date DESC, time DESC';
                $stmt = $this->connect()->prepare($sql);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt->execute();
                
                $results = $stmt->fetchAll();
                return $results;
            }

               
}