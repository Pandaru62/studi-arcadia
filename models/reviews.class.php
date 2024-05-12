<?php

require_once "Dbh.php";

trait getLastReview {
    protected function getLastReviews(bool $isChecked, int $limit = null) {
        $sql = 'SELECT * FROM reviews 
                WHERE isChecked = ? 
                ORDER BY id DESC';
        if ($limit) {
            $sql .= ' LIMIT ?';
        }
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(1, $isChecked, PDO::PARAM_BOOL);
        if ($limit) {
            $stmt->bindParam(2, $limit, PDO::PARAM_INT);
        }

        $stmt->execute();
        $reviews = $stmt->fetchAll();
        return $reviews;
}
}
class Reviews extends Dbh {
    use getLastReview;
    private $id;
    private $pseudo;
    private $message;
    private $isChecked;


    public function getId()
    {
        return $this->id;
    }

    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setMessage($message): self
    {
        $this->message = $message;

        return $this;
    }

    public function getPseudo()
    {
        return $this->pseudo;
    }

    public function setPseudo($pseudo): self
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function getIsChecked()
    {
        return $this->isChecked;
    }

    public function setIsChecked($isChecked): self
    {
        $this->isChecked = $isChecked;

        return $this;
    }  


    protected function getReviews() {
        $sql = 'SELECT * FROM reviews 
                ORDER BY isChecked ASC';
        // if ($limit) {
        //     $sql .= ' LIMIT ?';
        // }
        $stmt = $this->connect()->prepare($sql);
        // $stmt->bindParam(1, $isChecked, PDO::PARAM_BOOL);
        // if ($limit) {
        //     $stmt->bindParam(2, $limit, PDO::PARAM_INT);
        // }
        $stmt->execute();
        $allReviews = $stmt->fetchAll();
        return $allReviews;
    }


    protected function insertReview($pseudo, $message, $isChecked) {
        $sql = 'INSERT INTO reviews(pseudo, message, isChecked)
                VALUES (?, ?, ?)';
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(1, $this->pseudo, PDO::PARAM_STR);
        $stmt->bindParam(2, $this->message, PDO::PARAM_STR);
        $stmt->bindParam(3, $this->isChecked, PDO::PARAM_BOOL);

        // Assign values to class properties
        $this->pseudo = $pseudo;
        $this->message = $message;
        $this->isChecked = $isChecked;

        return $stmt->execute();
    }

    protected function deleteReview(int $id) {
        $sql = 'DELETE FROM reviews
                WHERE `reviews`.`id` = :id';
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $deletedReview = $stmt->fetch();
        return $deletedReview;
    }

    protected function validateReview(int $id) {
        $sql = 'UPDATE reviews
                SET isChecked = 1
                WHERE `reviews`.`id` = :id';
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $validatedReview = $stmt->fetch();
        return $validatedReview;
    }

}
