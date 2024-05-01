<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "./models/habitat.class.php";
require_once "./models/habitatcomment.class.php";

class SeeHabitatsCommentsController extends HabitatComment {
    use getHabitats;

    public function addHabComment() {
        if (isset($_SESSION['userRole']) && $_SESSION['userRole'] == 'vétérinaire') {
            $habitats = $this->getHabitats();
                require_once 'views/vet/addhabcommentform.php';
        }
    }

    public function seeHabComment() {
        if (isset($_SESSION['userRole'])) {
            $habitats = $this->getHabitats();
            $comments = $this->getHabitatsComments();
            require_once 'views/seehabcomment.php';
        }
    }

        
   
}



