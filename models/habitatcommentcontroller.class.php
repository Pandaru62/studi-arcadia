<?php

require_once "habitatcomment.class.php";
class HabitatCommentController extends HabitatComment {
    private $userId;
    private $habitatId;
    private $comment;

    public function __construct($userId = null, $habitatId = null, $comment = null) {
        $this->userId = $userId;
        $this->habitatId = $habitatId;
        $this->comment = $comment;
    }

    public function commentHabitat() {
        if($this->emptyInput() == true) {
            // Empty input
            header("Location: " .BASE_URL."/commenthabitat?error=emptyinput");
            exit();
        }
        $this->setHabitatComment($this->userId, $this->habitatId, $this->comment);
    }

    private function emptyInput() {
        if (empty($this->habitatId) || empty($this->comment)) {
            return true;
        } else {
            return false;
        }
    }
    
}