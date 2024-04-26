<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(isset($_POST["timeForm"])) {
    $newTime = $_POST["timeForm"];
    $time1 = $_POST["time1"];
    $time2 = $_POST["time2"];

$timeConfig = include('../lib/timeconfig.php');

// Update opening hours
$timeConfig['opening_hours']['time1'] = $time1;
$timeConfig['opening_hours']['time2'] = $time2;

// Save updated configuration
file_put_contents('../lib/timeconfig.php', '<?php return ' . var_export($timeConfig, true) . ';');

}

header('location: /studi-arcadia/time?success=timeupdated');
