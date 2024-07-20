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

            protected function getAllFeeding() {
                $sql = 'SELECT feeding.id AS feedingId, animal_id, date, time, food, quantity, first_name, species_id, species.name AS speciesName
                FROM feeding
                LEFT JOIN animals
                ON feeding.animal_id = animals.id
                LEFT JOIN species
                ON animals.species_id = species.id
                ';
                
                $stmt = $this->connect()->prepare($sql);       
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

            protected function getAllFeedingOld(int $limit, int $offset, string $sort) {

                switch($sort) {
                    case 'datenew':
                        $sort = "date DESC, time DESC";
                    break;
                    case 'dateold':
                        $sort = "date ASC, time ASC";
                    break;
                    case 'animalabc':
                        $sort = "animals.first_name DESC";
                    break;
                    case 'animalzyx':
                        $sort = "animals.first_name ASC";
                    break;
                    case 'specieabc':
                        $sort = "species.name DESC";
                    break;
                    case 'speciezyx':
                        $sort = "species.name ASC";
                    break;
                    default :
                    throw new InvalidArgumentException('Invalid sort');
        
                }
        
                $sql = 'SELECT feeding.id AS feedingId, animal_id, date, time, food, quantity, first_name, species_id, species.name AS speciesName
                FROM feeding
                LEFT JOIN animals
                ON feeding.animal_id = animals.id
                LEFT JOIN species
                ON animals.species_id = species.id
                ORDER BY '.$sort. '
                LIMIT :limit OFFSET :offset';
                
                $stmt = $this->connect()->prepare($sql);
                $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
                $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        
                $stmt->execute();
                
                $results = $stmt->fetchAll();
                return $results;
            }
            

        
            protected function getFeedingFiltered(int $limit, int $offset, string $sort, string $filter, $id) {

                switch($sort) {
                        case 'datenew':
                            $sort = "date DESC, time DESC";
                        break;
                        case 'dateold':
                            $sort = "date ASC, time ASC";
                        break;
                        case 'animalabc':
                            $sort = "animals.first_name DESC";
                        break;
                        case 'animalzyx':
                            $sort = "animals.first_name ASC";
                        break;
                        case 'specieabc':
                            $sort = "species.name DESC";
                        break;
                        case 'speciezyx':
                            $sort = "species.name ASC";
                        break;
                        default :
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
                        $filterStmt = 'DATE(feeding.date) = :id'; // Adjusted for date filtering
                        break;
                    default:
                        throw new InvalidArgumentException('Invalid filter');
                }
        
                $sql = 'SELECT feeding.id AS feedingId, animal_id, date, time, food, quantity, first_name, species_id, species.name AS speciesName
                        FROM feeding
                        LEFT JOIN animals
                        ON feeding.animal_id = animals.id
                        LEFT JOIN species
                        ON animals.species_id = species.id
                        WHERE '.$filterStmt.'
                        ORDER BY '.$sort. '
                        LIMIT :limit OFFSET :offset';
            
                $stmt = $this->connect()->prepare($sql);
                $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
                $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
                $stmt->bindValue(':id', $id); 
            
                $stmt->execute();
            
                $results = $stmt->fetchAll();
                return $results;
            }        
            
            protected function countAllFeeding() {
                $sql = 'SELECT COUNT(*) AS number FROM feeding';
                $stmt = $this->connect()->prepare($sql);
                $stmt->execute();
                
                $count = $stmt->fetchAll();
                $number = $count[0]['number'];
                return $number;
            }
        
            protected function countFilteredFeeding($sort, $filter, $id) {
                // gets the sorting method to assign the relevant sql stmt

                switch($sort) {
                        case 'datenew':
                            $sort = "date DESC, time DESC";
                        break;
                        case 'dateold':
                            $sort = "date ASC, time ASC";
                        break;
                        case 'animalabc':
                            $sort = "animals.first_name DESC";
                        break;
                        case 'animalzyx':
                            $sort = "animals.first_name ASC";
                        break;
                        case 'specieabc':
                            $sort = "species.name DESC";
                        break;
                        case 'speciezyx':
                            $sort = "species.name ASC";
                        break;
                        default :
                        throw new InvalidArgumentException('Invalid sort');
            
                    }
            
                $validFilters = ['animal', 'date']; // Define valid filters to prevent SQL injection
                if (!in_array($filter, $validFilters)) {
                    throw new InvalidArgumentException('Invalid filter');
                }
            
                // gets the filter and assigns the relevant sql stmt
                switch($filter) {
                    case 'animal':
                        $filterStmt = 'feeding.animal_id = :id';
                        break;
                    case 'date':
                        $filterStmt = 'DATE(feeding.date) = :id'; // Adjusted for date filtering
                        break;
                    default:
                        throw new InvalidArgumentException('Invalid filter');
                }
            
          
            
                $sql = 'SELECT COUNT(*) AS number FROM feeding
                        LEFT JOIN animals ON animals.id = feeding.animal_id
                        WHERE '.$filterStmt;
                
                $stmt = $this->connect()->prepare($sql);
                $stmt->bindParam(':id', $id);
                $stmt->execute();
                
                $count = $stmt->fetchAll();
                $number = $count[0]['number'];
                return $number;
            }
            

               
}