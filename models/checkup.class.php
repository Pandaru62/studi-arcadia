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
        WHERE animals.id = :id
        ORDER BY date DESC';
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

    protected function getAllCheckUpNew() {
        
        $sql = 'SELECT reports.*, animals.first_name AS animalFirstName, species_id, species.name AS speciesName, animals.image AS animalImage, user.first_name AS userFirstName, user.last_name AS userLastName
        FROM reports 
        LEFT JOIN animals 
        ON animals.id = reports.animal_id
        LEFT JOIN species
        ON species.id = animals.species_id
        LEFT JOIN user
        ON reports.vet_id = user.id';
        
        $stmt = $this->connect()->prepare($sql);

        $stmt->execute();
        
        return $results = $stmt->fetchAll();
    }

    protected function getAllCheckUp(int $limit, int $offset, string $sort) {
        switch($sort) {
            case 'datenew':
                $sort = "date DESC";
            break;
            case 'dateold':
                $sort = "date ASC";
            break;
            case 'animalabc':
                $sort = "animals.first_name DESC";
            break;
            case 'animalzyx':
                $sort = "animals.first_name ASC";
            break;
            default :
            throw new InvalidArgumentException('Invalid sort');

        }

        $sql = 'SELECT reports.*, animals.first_name AS animalFirstName, species_id, species.name AS speciesName, animals.image AS animalImage, user.first_name AS userFirstName, user.last_name AS userLastName
        FROM reports 
        LEFT JOIN animals 
        ON animals.id = reports.animal_id
        LEFT JOIN species
        ON species.id = animals.species_id
        LEFT JOIN user
        ON reports.vet_id = user.id
        ORDER BY '.$sort. '
        LIMIT :limit OFFSET :offset';
        
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);

        $stmt->execute();
        
        $results = $stmt->fetchAll();
        return $results;
    }
    

    protected function getCheckUpFiltered(int $limit, int $offset, string $sort, string $filter, $id) {
        switch($sort) {
            case 'datenew':
                $sort = "reports.date DESC";
                break;
            case 'dateold':
                $sort = "reports.date ASC";
                break;
            case 'animalabc':
                $sort = "animals.first_name DESC";
                break;
            case 'animalzyx':
                $sort = "animals.first_name ASC";
                break;
            default:
                throw new InvalidArgumentException('Invalid sort');
        }    
    
        $validSorts = ['reports.date DESC', 'reports.date ASC', 'animals.first_name DESC', 'animals.first_name ASC']; // Define valid sorting options to prevent SQL injection
        if (!in_array($sort, $validSorts)) {
            throw new InvalidArgumentException('Invalid sort');
        }

        
        
        $validFilters = ['animal', 'date']; // Define valid filters to prevent SQL injection
        if (!in_array($filter, $validFilters)) {
            throw new InvalidArgumentException('Invalid filter');
        }

    
    
        // gets the filter and assigns the relevant sql stmt
        switch($filter) {
            case 'animal':
                $filterStmt = 'animals.id = :id';
                break;
            case 'date':
                $filterStmt = 'DATE(reports.date) = :id'; // Adjusted for date filtering
                break;
            default:
                throw new InvalidArgumentException('Invalid filter');
        }

        $sql = 'SELECT reports.*, animals.first_name AS animalFirstName, species_id, species.name AS speciesName, animals.image AS animalImage, user.first_name AS userFirstName, user.last_name AS userLastName
                FROM reports 
                LEFT JOIN animals ON animals.id = reports.animal_id
                LEFT JOIN species ON species.id = animals.species_id
                LEFT JOIN user ON reports.vet_id = user.id
                WHERE '.$filterStmt.'
                ORDER BY '.$sort.'
                LIMIT :limit OFFSET :offset';

    
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->bindValue(':id', $id); // No need for PDO::PARAM_INT for dates
    
        $stmt->execute();
    
        $results = $stmt->fetchAll();
        return $results;
    }
    
    
    protected function countAllCheckUp() {
        $sql = 'SELECT COUNT(*) AS number FROM reports';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        
        $count = $stmt->fetchAll();
        $number = $count[0]['number'];
        return $number;
    }

    protected function countFilteredCheckUp($sort, $filter, $id) {
        // gets the sorting method to assign the relevant sql stmt
        switch($sort) {
            case 'datenew':
                $sort = "reports.date DESC";
                break;
            case 'dateold':
                $sort = "reports.date ASC";
                break;
            case 'animalabc':
                $sort = "animals.first_name DESC";
                break;
            case 'animalzyx':
                $sort = "animals.first_name ASC";
                break;
            default:
                throw new InvalidArgumentException('Invalid sort');
        }
    
        $validSorts = ['animals.first_name DESC', 'animals.first_name ASC', 'reports.date DESC', 'reports.date ASC']; // Define valid sorting options to prevent SQL injection
        if (!in_array($sort, $validSorts)) {
            throw new InvalidArgumentException('Invalid sort');
        }

        $validFilters = ['animal', 'date']; // Define valid filters to prevent SQL injection
        if (!in_array($filter, $validFilters)) {
            throw new InvalidArgumentException('Invalid filter');
        }
    
        // gets the filter and assigns the relevant sql stmt
        switch($filter) {
            case 'animal':
                $filterStmt = 'reports.animal_id = :id';
                break;
            case 'date':
                $filterStmt = 'DATE(reports.date) = :id'; // Adjusted for date filtering
                break;
            default:
                throw new InvalidArgumentException('Invalid filter');
        }
    
  
    
        $sql = 'SELECT COUNT(*) AS number FROM reports
                LEFT JOIN animals ON animals.id = reports.animal_id
                WHERE '.$filterStmt;
        
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
        $count = $stmt->fetchAll();
        $number = $count[0]['number'];
        return $number;
    }
    

}