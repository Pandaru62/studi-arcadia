<?php
function getServices(PDO $pdo, int $limit = null) {
    $sql = 'SELECT * FROM services ORDER BY id ASC';
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

function getServicesById (PDO $pdo, int $id) {
    $query = $pdo->prepare("SELECT * FROM services WHERE id = :id");
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();
    return $query->fetch();
    }

function getLastServiceId (PDO $pdo) {
    $query = $pdo->prepare("SELECT max(id) FROM services");
    $query->execute();
    return $query->fetch();
}


function saveService(PDO $pdo, string $name, string $description, string|null $image, string $isFree) {
    $sql = 'INSERT INTO `services` (`id`, `name`, `description`, `image`, `isFree`) VALUES (NULL, :name, :description, :image, :isFree);';
    $query = $pdo->prepare($sql);
    $query->bindParam(':name', $name, PDO::PARAM_STR);
    $query->bindParam(':description', $description, PDO::PARAM_STR);
    $query->bindParam(':image', $image, PDO::PARAM_STR);
    $query->bindParam(':isFree', $isFree, PDO::PARAM_STR);

    return $query->execute();
}


function editService(PDO $pdo, int $id, string $name, string $description, string|null $image, string $isFree) {
    $sql = 'UPDATE `services` SET `name` = :name, `description` = :description, `image` = :image, `isFree` = :isFree WHERE `id` = :id;';
    $query = $pdo->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->bindParam(':name', $name, PDO::PARAM_STR);
    $query->bindParam(':description', $description, PDO::PARAM_STR);
    $query->bindParam(':image', $image, PDO::PARAM_STR);
    $query->bindParam(':isFree', $isFree, PDO::PARAM_STR);

    return $query->execute();
}
