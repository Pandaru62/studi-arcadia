
<?php

// Redirects to the time view

class OpeningTimeController {
 
    public function time() {      
        if (isset($_SESSION['userRole']) && $_SESSION['userRole'] == 'admin') {
            require_once 'views/admin/time.php';
        } else {
            header("Location: ".BASE_URL);
        }
    }

}