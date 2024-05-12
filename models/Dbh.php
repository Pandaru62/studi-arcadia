<?php
// Database 

if (!defined('BASE_URL')) {
    // Check if the environment is Heroku
$isHeroku = getenv('HEROKU_APP') ? true : false;

if ($isHeroku) {
    // Adjust base URL for Heroku
    define("BASE_URL", '/');
} else {
    // Adjust base URL for local environment
    define("BASE_URL", '/studi-arcadia');
}
}



class Dbh {
    private $host = "localhost";
    private $user = "root";
    private $pwd = "root";
    private $dbName = "arcadia";
    private $port = "3307";

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
                echo "Connection failed: " . $e->getMessage();
                }
                
        } else {
            try {
                $dsn = 'mysql:host='.$this->host.';dbname='.$this->dbName.';port='.$this->port;
                $pdo = new PDO($dsn, $this->user, $this->pwd);
                $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                return $pdo;
            }
            catch (PDOException $e) {
                print "Error!:" . $e->getMessage() . "<br/>";
                die();
            }
        }

    }

    protected function isLoggedIn() {
        if(isset($_SESSION['userRole']) & isset ($_SESSION['userEmail'])) {
            return true;
        } else {
            return false;
        }
    }
}

