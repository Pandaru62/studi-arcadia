<?php

require_once "./vendor/mongodb/mongodb/src/Client.php";

trait MongoDB {

    protected function connectMongoDb() {
        $uri = 'mongodb+srv://lorisbch:OlOa7jVjSSblVm35@arcadia.yirclzp.mongodb.net/';
        $collection = (new MongoDB\Client($uri))->Arcadia->countVisitors;
        return $collection;
    }
}
class MongoDBConnection {
use MongoDB;

    
}

           
