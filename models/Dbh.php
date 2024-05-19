<?php
// Database

if (!defined('BASE_URL')) {
    define("BASE_URL", '');
}


function handleError($exception) {
    // Log the error to a file
    error_log($exception->getMessage(), 3);
    
    echo "Une erreur s'est produite.";
    header('Location: /404');
    exit();
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
                    handleError($e);
                }
                
        } else {
            try {
                $dsn = 'mysql:host='.$this->host.';dbname='.$this->dbName.';port='.$this->port;
                $pdo = new PDO($dsn, $this->user, $this->pwd);
                $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                return $pdo;
            }
            catch (PDOException $e) {
                handleError($e);
            }
        }

    }

    
    protected function handleError($exception) {
        // Log the error to a file
        error_log($exception->getMessage(), 3, './lib/error_log_file.log');
        
        echo "Une erreur s'est produite.";
        header('Location: /404');
        exit();
    }

    protected function isLoggedIn() {
        if(isset($_SESSION['userRole']) & isset ($_SESSION['userEmail'])) {
            return true;
        } else {
            return false;
        }
    }

}

