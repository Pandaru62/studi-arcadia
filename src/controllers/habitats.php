<?php

function habitats()
{
    require('templates/habitats.php');
}

function getHabitatsbyId(PDO $pdo, int $id, int $limit = null) {
    $sql = 'SELECT * FROM habitats
            WHERE id = :id';
    if ($limit) {
        $sql .= ' LIMIT :limit';
    }
    $query = $pdo->prepare($sql);
    if ($limit) {
    $query->bindParam(':limit', $limit, PDO::PARAM_INT);
    }
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();
    return $query->fetchAll();
}

function getHabitats(PDO $pdo, int $limit = null) {
    $sql = 'SELECT * FROM habitats
            ORDER BY id ASC';
    if ($limit) {
        $sql .= ' LIMIT :limit';
    }
    $query = $pdo->prepare($sql);
    if ($limit) {
    $query->bindParam(':limit', $limit, PDO::PARAM_INT);
    }
    $query->execute();
    return $query->fetchAll();
}


function getSpeciesByHabitat (PDO $pdo, int $id) {
    $query = $pdo->prepare("SELECT * FROM species
                            -- LEFT JOIN habitats ON habitats.id = species.habitat_id
                            WHERE habitat_id = :id");
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
    }

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

    // function getAnimalBySpecies (PDO $pdo, int $id) {
    //     $query = $pdo->prepare("SELECT * FROM animals INNER JOIN species ON animals.species_id = species.id WHERE species_id = :id");
    //     $query->bindParam(':id', $id, PDO::PARAM_INT);
    //     $query->execute();
    //     return $query->fetchAll(PDO::FETCH_ASSOC);
    //     }

        function getAnimalsBySpeciesId (PDO $pdo, int $id) {
            $query = $pdo->prepare(
                "SELECT animals.id, first_name, species_id, species.image, species.id, species.name, animals.image AS anim_image, habitat_id, habitats.name AS hab_name, habitats.image AS hab_image FROM animals
                LEFT JOIN species ON animals.species_id = species.id
                LEFT JOIN habitats ON habitats.id = species.habitat_id 
                WHERE species_id = :id");
            $query->bindParam(':id', $id, PDO::PARAM_INT);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }