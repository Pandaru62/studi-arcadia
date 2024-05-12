<?php

session_start();

// before deleting service
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deleteService'])) {
    // Check CSRF token
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die('Action non autorisée');
    }
    
    $serviceId = $_POST['serviceId'];
    header("Location: /studi-arcadia/deleteservice?id=".$serviceId);
    
} else {
    header("Location: /studi-arcadia/");

}

// before deleting user
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deleteUser'])) {
    // Check CSRF token
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die('Action non autorisée');
    }
    
    $userId = $_POST['userId'];
    header("Location: /studi-arcadia/deleteaccount?id=".$userId);
    
} else {
    header("Location: /studi-arcadia/");

}

// before deleting habitat
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deleteHabitat'])) {
    // Check CSRF token
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die('Action non autorisée');
    }
    
    $habitatId = $_POST['habitatId'];
    header("Location: /studi-arcadia/deletehabitat?id=".$habitatId);
    
} else {
    header("Location: /studi-arcadia/");

}

// before deleting species


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deleteSpecies'])) {
    // Check CSRF token
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die('Action non autorisée');
    }
    
    $speciesId = $_POST['speciesId'];
    header("Location: /studi-arcadia/deletespecies?id=".$speciesId);
    
} else {
    header("Location: /studi-arcadia/");

}



// before deleting animal


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deleteAnimal'])) {
    // Check CSRF token
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die('Action non autorisée');
    }
    
    $animalId = $_POST['animalId'];
    header("Location: /studi-arcadia/deleteanimal?id=".$animalId);
    
} else {
    header("Location: /studi-arcadia/");

}



