<?php

require_once('Dbh.php');
require_once('habitat.class.php');

trait getLastHabComment {
    protected function getLastHabitatComment(int $habitatId, int $limit = null) {
        $sql = 'SELECT habitatcomments.id AS commentId, user_id, habitat_id, comment, name, user.first_name, user.last_name FROM habitatcomments
        LEFT JOIN habitats
        ON habitatcomments.habitat_id = habitats.id
        LEFT JOIN user
        ON habitatcomments.user_id = user.id 
        WHERE habitat_id = :id';
        if($limit !== null) {
            $sql .= ' LIMIT :limit';
        }
        $stmt = $this->connect()->prepare($sql);
        if($limit !== null) {
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        }
        $stmt->bindParam(':id', $habitatId, PDO::PARAM_INT);
        $stmt->execute();
        
        $results = $stmt->fetchAll();
        return $results;
    }
}
class HabitatComment extends Dbh {
use getHabitats;
    protected function getHabitatsComments(int $habitatId = null) {
            $habitats = $this->getHabitats();
            $sql = 'SELECT habitatcomments.id AS commentId, user_id, habitat_id, comment, name, user.first_name, user.last_name FROM habitatcomments
            LEFT JOIN habitats
            ON habitatcomments.habitat_id = habitats.id
            LEFT JOIN user
            ON habitatcomments.user_id = user.id';
            if($habitatId !== null) {
                $sql .= 'WHERE habitat_id = :id';
            }
            $stmt = $this->connect()->prepare($sql);
            if($habitatId !== null) {
                $stmt->bindParam(':id', $habitatId, PDO::PARAM_INT);
            }
            $stmt->execute();
            
            $results = $stmt->fetchAll();
            return $results;
        }

        protected function setHabitatComment ($userId, $habitatId, $comment) {
            ;
            $sql = 'INSERT INTO habitatcomments (user_id, habitat_id, comment)
            VALUES (?, ?, ?)';
            $stmt = $this->connect()->prepare($sql);
    
            if(!$stmt->execute(array($userId, $habitatId, $comment))) {
                $stmt = null;
                header("Location: " .BASE_URL."/commenthabitat?error=commentnotadded");
                exit();
            }
    
            $stmt = null;
        
        }
    

}