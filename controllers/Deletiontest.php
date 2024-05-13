<?php

session_start();

// before deleting service
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deleteService'])) {
    // Check CSRF token
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die('Action non autorisée');
    }
    
    $serviceId = $_POST['serviceId'];
    header("Location: /deleteservice?id=".$serviceId);
    exit();
    
} // before deleting user
elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deleteUser'])) {
    // Check CSRF token
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die('Action non autorisée');
    } else {
        $userId = $_POST['userId'];
        header("Location: /deleteaccount?id=".$userId);
        exit();
    }
} // before deleting habitat
elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deleteHabitat'])) {
    // Check CSRF token
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die('Action non autorisée');
    } else {
    
    $habitatId = $_POST['habitatId'];
    header("Location: /deletehabitat?id=".$habitatId);
    }
} // before deleting species
elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deleteSpecies'])) {
    // Check CSRF token
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die('Action non autorisée');
    } else {
    
    $speciesId = $_POST['speciesId'];
    header("Location: /deletespecies?id=".$speciesId);
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deleteAnimal'])) {
    // Check CSRF token
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die('Action non autorisée');
    } else {
    
    $animalId = $_POST['animalId'];
    header("Location: /studi-arcadia/deleteanimal?id=".$animalId);
    }
} else
 {
    header("Location: /");

}




