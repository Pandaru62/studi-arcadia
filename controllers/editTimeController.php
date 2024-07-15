<?php
session_start();

require_once '../vendor/autoload.php';
use MongoDB\Client;

// CSRF token validation
if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    die('Erreur CSRF !');
}

// Admin role validation
if (!isset($_SESSION['userRole']) || $_SESSION['userRole'] !== 'admin') {
    header("Location: /");
    exit();
}

// Form data validation
if (!isset($_POST["timeForm"], $_POST["time1"], $_POST["time2"])) {
    header("Location: /time?error=missingdata");
    exit();
}

$newTime = $_POST["timeForm"];
$time1 = $_POST["time1"];
$time2 = $_POST["time2"];

// Load environment variables from .env file
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

// Get MongoDB URI
$uri = getenv('MONGODB_URI') ?: ($_ENV['MONGODB_URI'] ?? null);
if (!$uri) {
    die('MongoDB URI is not set in environment variables.');
}

try {
    // Connect to MongoDB
    $client = new MongoDB\Client($uri);
    $collection = $client->selectDatabase('Arcadia')->selectCollection('time');

    // Define the document containing both time1 and time2 data
    $document = [
        '_id' => 'openingTime',
        'time1' => $time1,
        'time2' => $time2,
    ];

    $options = ['upsert' => true]; // Insert if document does not exist, update if it exists

    // Perform the upsert operation
    $result = $collection->replaceOne(['_id' => 'openingTime'], $document, $options);

    // Check for errors in the result
    if ($result->getModifiedCount() == 0 && $result->getUpsertedCount() == 0) {
        // No document matched the criteria, and no new document was upserted
        header("Location: /time?error=timeerror");
        exit();
    } else {
        // Document was updated or upserted successfully
        header("Location: /time?success=timeupdated");
        exit();
    }
} catch (Exception $e) {
    // Handle exception and log error
    error_log('Error connecting to MongoDB or performing operation: ' . $e->getMessage());
    header("Location: /time?error=databaseerror");
    exit();
}
