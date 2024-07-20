<?php

session_start();
define("BASE_URL", "/studi-arcadia");

if(isset($_SESSION['userRole']) && $_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['searchAnimalForm'])) {

    $id = $_POST['animalSpec'];

    header("Location: /seeanimals?filter=animalbyspecies&id=".$id);
    exit();
} else {

    
    header("Location: /seeanimals?filter=animalbyspecies&id=1");
    exit();
}
