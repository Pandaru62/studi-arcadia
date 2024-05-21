<?php
class TimeRetrieving {
    public static function getTimeConfig() {
        // Connect to MongoDB
        $uri = getenv('MONGODB_URI');

        if (!$uri) {
            $uri = $_ENV['MONGODB_URI'] ?? null;
        }

        $client = new MongoDB\Client($uri);
        $collection = $client->selectDatabase('Arcadia')->selectCollection('time');

        // Retrieve time1 and time2 values from MongoDB
        $result = $collection->findOne(['_id' => 'openingTime']);
        $time1 = $result['time1'];
        $time2 = $result['time2'];

        return ['time1' => $time1, 'time2' => $time2];
    }
}
