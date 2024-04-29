<?php

require_once "./models/habitat.class.php";

class editHabitatController extends Habitats {
    public function deleteHab() {      
        
        if(isset($_SESSION) && isset($_GET['id']) && $_SESSION["userRole"] == "admin") {
            $deletedHabitat = $_GET['id'];
            $delete = $this->deleteHabitat($deletedHabitat);
            header("Location: ".BASE_URL."/habitats?success=habitatdeleted");
        } elseif(!isset($_GET['id'])) {
            header("Location: ".BASE_URL."/habitats?error=habitatnotdeleted");
        } else {
            header("Location: ".BASE_URL);
        }
    }

    public function editHab() {      
            
        if(isset($_SESSION) && isset($_GET['id']) && $_SESSION["userRole"] == "admin" ) {
            $editedHabitatId = $_GET['id'];
            $editedHabitat = $this->getHabitatsbyId($editedHabitatId);
            require "./views/admin/edithabitatform.php";
            return ($editedHabitat);
        } elseif(!isset($_GET['id'])) {
            header("Location: ".BASE_URL."/habitats?error=habitatnotedited");
        } else {
            header("Location: ".BASE_URL);
        }
    }

    public function addHab() {      
            
        if(isset($_SESSION) && $_SESSION["userRole"] == "admin") {
            require "./views/admin/addhabitatform.php";
        } else {
            header("Location: ".BASE_URL."/addhabitat?error=habitatnotadded");
        }
    }

}
