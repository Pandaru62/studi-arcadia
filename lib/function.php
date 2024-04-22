<?php

function getRandomImageFromFolder($folderPath) {
        // Get list of files in the folder
        $files = scandir($folderPath);
    
        // Remove . and .. entries
        $files = array_diff($files, array('.', '..'));
    
        // Choose a random file from the list
        $randomFile = $folderPath . '/' . $files[array_rand($files)];
    
        // Return the random file path
        return $randomFile;
}