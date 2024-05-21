<?php
session_start();

require_once '../vendor/autoload.php';
use MongoDB;


if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    die('Erreur CSRF !');
} else {
    if (isset($_SESSION) && $_SESSION["userRole"] == "admin") {
        if(isset($_POST["timeForm"])) {
            $newTime = $_POST["timeForm"];
            $time1 = $_POST["time1"];
            $time2 = $_POST["time2"];

            $envFile = '../.env';
            if (file_exists($envFile)) {
                $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                foreach ($lines as $line) {
                    if (strpos($line, '=') !== false && substr($line, 0, 1) !== '#') {
                        list($key, $value) = explode('=', $line, 2);
                        $_ENV[$key] = $value;
                    }
                }
            }

            $uri = getenv('MONGODB_URI');

            if (!$uri) {
                $uri = $_ENV['MONGODB_URI'] ?? null;
            }

            $client = new MongoDB\Client($uri);
            $collection = $client->selectDatabase('Arcadia')->selectCollection('time');

            // Define the document containing both time1 and time2 data
            $document = [
                '_id' => 'openingTime', // Assuming '_id' field is used for unique identifier
                'time1' => $time1,
                'time2' => $time2,
            ];

            $options = [
                'upsert' => true // Insert if document does not exist, update if it exists
            ];

            // Perform the upsert operation for the combined document
            $result = $collection->replaceOne(['_id' => 'openingTime'], $document, $options);

            // Check for errors in the result
            if ($result->getModifiedCount() == 0 && $result->getUpsertedCount() == 0) {
                header("Location: /time?success=timeupdated");
                exit();
            } else {
                header("Location: /time?error=timeerror");
                exit();
            }
        }

    } else {
        header("Location: /");
        exit();
    }
}
