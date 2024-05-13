<?php
session_start();


if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    die('Erreur CSRF !'); 
}

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

header('location: /time?success=timeupdated');
