<?php

require_once "./models/habitat.class.php";

class editHabitatController extends Habitats {
    public function deleteHab() {
        
        if(isset($_SESSION["userRole"])&& $_SESSION["userRole"] == "admin") {
            if(isset($_GET['id']) ) {
                $deletedHabitat = $_GET['id'];
                $delete = $this->deleteHabitat($deletedHabitat);
                header("Location: /habitats?success=habitatdeleted");
            } else {
                header("Location: /habitats?error=habitatnotdeleted");
            }
        } else {
            header("Location: /");
        }
    }

    public function editHab() {
            
        if(isset($_SESSION) && $_SESSION["userRole"] == "admin" ) {
            if(isset($_GET['id']) ) {
                $editedHabitatId = $_GET['id'];
                $editedHabitat = $this->getHabitatsbyId($editedHabitatId);
                require "./views/admin/edithabitatform.php";
                return ($editedHabitat);
            } else {
            header("Location: /habitats?error=habitatnotedited");
            } 
        } else {
            header("Location: /");
        }
    }

    public function addHab() {
            
        if(isset($_SESSION["userRole"]) && $_SESSION["userRole"] == "admin") {
            require "./views/admin/addhabitatform.php";
        } else {
            header("Location: /");
        }
    }

}
