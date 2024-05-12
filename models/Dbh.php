<?php
// Database 

if (!defined('BASE_URL')) {
    define("BASE_URL", '/studi-arcadia');
}

class Dbh {
    private $host = "localhost";
    private $user = "root";
    private $pwd = "root";
    private $dbName = "arcadia";
    private $port = "3307";

    protected function connect() {
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

    protected function isLoggedIn() {
        if(isset($_SESSION['userRole']) & isset ($_SESSION['userEmail'])) {
            return true;
        } else {
            return false;
        }
    }
}

