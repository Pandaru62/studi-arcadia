<?php
session_start();

define('_SERVICES_IMG_PATH_', '/studi-arcadia/uploads/services/');
define("BASE_URL", '/studi-arcadia');


// Include necessary files
include_once "../models/services.class.php";
include_once "../models/servicesController.php";

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


function checkFile($file, $serviceId) {
    if (isset($_FILES['file'])) {
        // If a file was sent
        if(isset($_FILES['file']['tmp_name']) && $_FILES['file']['tmp_name'] != '') {
            // returns false if it's not an image
            $checkImage = getimagesize($_FILES['file']['tmp_name']);
            if ($checkImage !== false) {
                // changes the name if it's an image and moves it
                $fileName = uniqid().'-'.slugify($_FILES['file']['name']);
                $destination = dirname(__FILE__) . "/../uploads/services/" . $fileName;
                if (move_uploaded_file($_FILES['file']['tmp_name'], $destination)) {
                    // File uploaded successfull
                    return $fileName;

                } else {
                    // Error moving file
                    header("Location: " . BASE_URL . "/editservice?service=".$serviceId."&error=uploaderror");
                }
            } else {
                // else error message
                header("Location: " . BASE_URL . "/editservice?service=".$serviceId."&error=notimage");
                exit();
            }
        }
    }
}


// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["editService"]) && isset($_SESSION) && $_SESSION['userRole'] == 'admin' || $_SESSION['userRole'] == 'employé') {
    // Get form data
    $serviceId = $_POST["serviceId"];
    $serviceName = $_POST["serviceName"];
    $serviceDescription = $_POST["serviceDescription"];
    $serviceImage = $_FILES["file"];
    $isFree = $_POST["isFree"];

    $fileName = checkFile($serviceImage, $serviceId);

    // Update service
    $service = new ServicesContr($serviceName, $serviceDescription, $fileName, $isFree);
    $service->updateService($serviceId);

    header("Location: " . BASE_URL . "/services?success=serviceEdited");

}

