<?php
session_start();
// Check if form is submitted

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["searchAnimalForm"]) && isset($_SESSION['userRole'])) {
    // Get form data
    $id = $_POST["searchAnimal"];

    // Redirecting to the page

    header("Location: /seecheckup?filter=animal&sort=datenew&num=".$id."&pp=1");

}

var_dump($_SERVER["REQUEST_METHOD"], "POST" && isset($_POST["searchDateForm"]), isset($_SESSION['userRole']));

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["searchDateForm"]) && isset($_SESSION['userRole'])) {
    // Get form data
    $id = $_POST["searchDate"];

    // Redirecting to the page

    header("Location: /seecheckup?filter=date&sort=datenew&num=".$id."&pp=1");

}