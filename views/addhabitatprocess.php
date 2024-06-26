<?php

session_start();

if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    die('Erreur CSRF !'); 
}


// Include necessary files
include_once "../models/habitat.class.php";
include_once "../models/habitatsController.php";

function slugify($text, string $divider = '-')
{
    // Get file extension
    $extension = pathinfo($text, PATHINFO_EXTENSION);
    // Remove extension from the filename
    $filename = pathinfo($text, PATHINFO_FILENAME);
    
    // replace non letter or digits by divider
    $filename = preg_replace('~[^\pL\d]+~u', $divider, $filename);
    // transliterate
    $filename = iconv('utf-8', 'us-ascii//TRANSLIT', $filename);
    // remove unwanted characters
    $filename = preg_replace('~[^-\w]+~', '', $filename);
    // trim
    $filename = trim($filename, $divider);
    // remove duplicate divider
    $filename = preg_replace('~-+~', $divider, $filename);
    // lowercase
    $filename = strtolower($filename);
    if (empty($filename)) {
        $filename = 'n-a';
    }

    // Append extension
    return $filename . '.' . $extension;
}


function checkFile() {
    if (isset($_FILES['file'])) {
        // If a file was sent
        if(isset($_FILES['file']['tmp_name']) && $_FILES['file']['tmp_name'] != '') {
            // returns false if it's not an image
            $checkImage = getimagesize($_FILES['file']['tmp_name']);
            if ($checkImage !== false) {
                // changes the name if it's an image and moves it
                $fileName = uniqid().'-'.slugify($_FILES['file']['name']);
                $destination = dirname(__FILE__) . "/../uploads/habitats/" . $fileName;
                if (move_uploaded_file($_FILES['file']['tmp_name'], $destination)) {
                    // File uploaded successfull
                    return $fileName;

                } else {
                    // Error moving file
                    header("Location: /addhabitat?error=uploaderror");
                }
            } else {
                // else error message
                header("Location: /addhabitat?error=notimage");
                exit();
            }
        }
    }
}


// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["addHabitat"]) && isset($_SESSION) && $_SESSION['userRole'] == 'admin') {
    // Get form data
    $habitatName = $_POST["habitatName"];
    $habitatDescription = $_POST["habitatDescription"];
    $habitatImage = $_FILES["file"];

    $fileName = checkFile();

    // var_dump($habitatName, $habitatDescription, $habitatImage);

    // Adding habitat
    $service = new HabitatsContr($habitatName, $fileName, $habitatDescription);
    $service->addHabitat();

    header("Location: /addhabitat?success=habitatadded");

}

