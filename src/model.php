<?php
function dbConnect()
{
    try {
        $database = new PDO('mysql:host=localhost;dbname=arcadia;charset=utf8-mb4;port=3307', 'root', 'root');

        return $database;
    } catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
}