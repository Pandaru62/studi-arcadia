
<?php

// Redirects to the time view

class OpeningTimeController {
 
    public function time() {
        if (isset($_SESSION['userRole']) && $_SESSION['userRole'] == 'admin') {

            require_once './models/timeretrieving.class.php';

            // Retrieve time1 and time2 values from MongoDB
            $timeConfig = TimeRetrieving::getTimeConfig();
            $times = [];
            $times[1] = $timeConfig['time1'];
            $times[2] = $timeConfig['time2'];

            require_once 'views/admin/time.php';
            return $times;
        } else {
            header("Location: ".BASE_URL);
        }
    }

}