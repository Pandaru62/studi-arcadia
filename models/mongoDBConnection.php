<?php

require_once "./vendor/mongodb/mongodb/src/Client.php";

trait MongoDB {

    protected function connectMongoDb() {
        $uri = 'mongodb://root:root@localhost:8080';
        $collection = (new MongoDB\Client($uri))->arcadia->countVisitors;
        return $collection;
    }
}
class MongoDBConnection {
use MongoDB;

    
}

           
