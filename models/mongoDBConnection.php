<?php


trait MongoDB {

    protected function connectMongoDb() {

        $uri = getenv('MONGODB_URI');

            if (!$uri) {
                $uri = $_ENV['MONGODB_URI'] ?? null;
            }
            
        $client = new MongoDB\Client($uri);
        $collection = $client->Arcadia->countVisitors;

        return $collection;


    }
}
    class MongoDBConnection {
    use MongoDB;
        
    }

           
