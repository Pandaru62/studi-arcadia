<?php
// Database 

class Dbh {
    private $host = "localhost";
    private $user = "root";
    private $pwd = "root";
    private $dbName = "arcadia";
    private $port = "3307";

    protected function connect() {
        $dsn = 'mysql:host='.$this->host.';dbname='.$this->dbName.';port='.$this->port;
        $pdo = new PDO($dsn, $this->user, $this->pwd);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }
}
