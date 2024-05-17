<?php


trait MongoDB {

    protected function connectMongoDb() {

            $uri = getenv('MONGODB_URI');
            if (!$uri) {
                $uri = MONGODB_URI; }
            
        $collection = (new MongoDB\Client($uri))->Arcadia->countVisitors;
        return $collection;

    }
}
    class MongoDBConnection {
    use MongoDB;
        
    }

           
