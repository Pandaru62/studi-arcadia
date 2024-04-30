<?php

session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define("BASE_URL", '/studi-arcadia');

// Include necessary files
include_once "../models/animal.class.php";
include_once "../models/animalController.class.php";

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


function checkFile($id) {
    if (isset($_FILES['file'])) {
        // If a file was sent
        if(isset($_FILES['file']['tmp_name']) && $_FILES['file']['tmp_name'] != '') {
            // returns false if it's not an image
            $checkImage = getimagesize($_FILES['file']['tmp_name']);
            if ($checkImage !== false) {
                // changes the name if it's an image and moves it
                $fileName = uniqid().'-'.slugify($_FILES['file']['name']);
                $destination = dirname(__FILE__) . "/../uploads/ANIMAUX/" . $fileName;
                if (move_uploaded_file($_FILES['file']['tmp_name'], $destination)) {
                    // File uploaded successfull
                    return $fileName;

                } else {
                    // Error moving file
                    header("Location: " . BASE_URL . "/editanimal?id=".$id."&error=uploaderror");
                }
            } else {
                // else error message
                header("Location: " . BASE_URL . "/editanimal?id=".$id."&error=notimage");
                exit();
            }
        }
    }
}


// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["editAnimalForm"]) && isset($_SESSION) && $_SESSION['userRole'] == 'admin') {
    // Get form data
    $animalId = $_POST["animalId"];
    $firstName = $_POST["animalFirstName"];
    $speciesId = $_POST["animalSpecies"];
    $keepOrChangePhoto = $_POST["keepOrChangePhoto"];

    // var_dump($animalId, $animalFirstName, $animalSpecies, $keepOrChangePhoto);

    // Checks if the user wants to change the photo or not
    if($keepOrChangePhoto == 'change') {
    $habitatImage = $_FILES["file"];
    // if he changes, a new photo is being checked and uploaded
    $fileName = checkFile($animalId); 
    } else {
    // else we keep the current image with the same name
    $fileName = $_POST["currentImage"];
    }

    // var_dump($fileName);

    // // Editing animal
    $animal = new AnimalContr($firstName, $speciesId, $fileName);
    $animal->updateAnimal($animalId);

    header("Location: " . BASE_URL . "/seeanimals?success=animaledited");

}

