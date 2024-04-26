
<?php

// Redirects to the time view

class OpeningTimeController extends Habitats {
 
    public function time() {      
        if (isset($_SESSION['userRole']) && $_SESSION['userRole'] == 'admin') {
            $menuHabitats = $this->getHabitats();
            require_once 'views/admin/time.php';
            return $menuHabitats;
        } else {
            header("Location: ".BASE_URL);
        }
    }

}