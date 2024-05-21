<?php


// Define the path to your .env file
$dotenvFilePath = '../.env';

if (file_exists($dotenvFilePath)) {
    $dotenvFileContents = file_get_contents($dotenvFilePath);
    $dotenvLines = preg_split('/\R/', $dotenvFileContents);

    foreach ($dotenvLines as $line) {
        if (strpos($line, '=') !== false && substr($line, 0, 1) !== '#') {
            list($key, $value) = explode('=', $line, 2);
            // Remove quotes on password
            $value = trim($value, "\"'");
            $_ENV[$key] = $value;
        }
    }
}


function handleError($exception) {
    // Log the error to a file
    error_log($exception->getMessage(), 3);
    
    echo "Une erreur s'est produite.";
    header('Location: /404');
    exit();
}


class Dbh {

    private $host;
    private $user;
    private $pwd;
    private $dbName;
    private $port;

    public function __construct() {

    $this->host = $_ENV['MYSQL_HOST'] ?? null;
    $this->user = $_ENV['MYSQL_USER'] ?? null;
    $this->pwd = $_ENV['MYSQL_PASSWORD'] ?? null;
    $this->dbName = $_ENV['MYSQL_DBNAME'] ?? null;
    $this->port = $_ENV['MYSQL_PORT'] ?? null;

    }

    protected function connect() {

        if(getenv('JAWSDB_URL') !== false) {
            try {
                    $url = getenv('JAWSDB_URL');
                    $dbparts = parse_url($url);

                    $hostname = $dbparts['host'];
                    $username = $dbparts['user'];
                    $password = $dbparts['pass'];
                    $database = ltrim($dbparts['path'],'/');


                    $pdo = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
                    // set the PDO error mode to exception
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    return $pdo;
                } catch(PDOException $e) {
                    handleError($e);
                }
                
        } else {
            try {
                $dsn = 'mysql:host='.$_ENV['MYSQL_HOST'].';dbname='.$_ENV['MYSQL_DBNAME'].';port='.$_ENV['MYSQL_PORT'];
                $pdo = new PDO($dsn, $_ENV['MYSQL_USER'], $_ENV['MYSQL_PASSWORD']);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $pdo;
            } catch (PDOException $e) {
                handleError($e);
            }
           
        }

    }

    
    protected function handleError($exception) {
        // Log the error to a file
        error_log($exception->getMessage(), 3, 'path/to/log/file.log');
        echo "Une erreur s'est produite.";
        header('Location: /404');
        exit();
    }

    protected function isLoggedIn() {
        if(isset($_SESSION['userRole']) & isset ($_SESSION['userEmail'])) {
            return true;
        }
    }

}

