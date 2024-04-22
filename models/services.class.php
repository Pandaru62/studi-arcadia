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
    private $id;
    private $name;
    private $description;
    private $image;
    private $isFree;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getIsFree()
    {
        return $this->isFree;
    }

    public function setIsFree($isFree): self
    {
        $this->isFree = $isFree;

        return $this;
    }

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
