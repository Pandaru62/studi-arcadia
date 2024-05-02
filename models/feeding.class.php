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

               
}