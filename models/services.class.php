<?php

require_once "Dbh.php";

trait returnServices{
        protected function getServices(int $limit = null) {
        $sql = 'SELECT * FROM services ORDER BY id ASC';
        if ($limit) {
            $sql .= ' LIMIT :limit';
        }
        $stmt = $this->connect()->prepare($sql);
        if ($limit) {
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            }
        $stmt->execute();
        
        $services = $stmt->fetchAll();
        return $services;
    }
}
class Services extends Dbh {
    use returnServices;
    protected function getServiceById(int $id) {
        $sql = 'SELECT * FROM services
                WHERE id = :id';
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        
        $service = $stmt->fetch();
        return $service;
    }

    protected function editServices($id, $name, $description, $image, $isFree) {
        $sql = 'UPDATE services SET name = :name, description = :description, image = :image, isFree = :isFree WHERE id = :id';
        $stmt = $this->connect()->prepare($sql);
    
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':isFree', $isFree);
    
        if (!$stmt->execute()) {
            $stmt = null;
            header("Location: " . BASE_URL . "/editservice?service=".$id."&error=editservices");
            exit();
        }
    
        $stmt = null;
    }
    
    
    protected function setService ($name, $description, $image, $isFree) {
        $sql = 'INSERT INTO services (name, description, image, isFree)
        VALUES (?, ?, ?, ?)';
        $stmt = $this->connect()->prepare($sql);

        if(!$stmt->execute(array($name, $description, $image, $isFree))) {
            $stmt = null;
            header("Location: " .BASE_URL."/addservice?error=addservice");
            exit();
        }

        $stmt = null;
    
    }

    protected function deleteService(int $id) {
        $sql = 'DELETE FROM services 
                WHERE `services`.`id` = :id';
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $serviceDeleted = $stmt->fetch();
        return $serviceDeleted;
    }

}

