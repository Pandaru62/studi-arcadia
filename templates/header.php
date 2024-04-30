<?php
if(file_exists('./lib/config.php')) {
    require_once('./lib/config.php');
} else {
require_once('../lib/config.php');
}

(isset($_SESSION['userEmail'])) ? $role = checkRole($_SESSION['userRole']) : $role = "visiteur";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Darumadrop+One&family=Mountains+of+Christmas&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Darumadrop+One&family=Hind+Madurai:wght@300;400;500;600;700&family=Mountains+of+Christmas&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="scss/main.min.css">

    <title>Zoo d'Arcadia</title>
</head>

<header>
    <nav class="navbar navbar-expand-lg bg-arc-dark sticky-top">
        <div class="container-fluid">
            <img src="assets/Logo.svg" alt="Logo" height="60px" class="d-inline-block align-text-top" id="logo">
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
            <i class="bi bi-three-dots-vertical text-light"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarToggler">
                <ul class="navbar-nav nav-underline mx-auto">
                <?php foreach($mainMenu[$role] as $url => $tag):
                if($tag == 'Habitats & Animaux'):
                // Habitats exception : this one retrieves data from the db to display the different habitats
                ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link link-light dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Habitats & Animaux
                        </a>
                        <ul class="dropdown-menu bg-arc-mint-green text-light">
                            <li><a class="dropdown-item" href="<?=BASE_URL.$url;?>">Tous les habitats</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <?php
                            foreach ($menuHabitats as $menuHabitat) { 
                                ?>
                            <li><a class="dropdown-item" href="<?=BASE_URL?>/showHabitat?habitat=<?=$menuHabitat['id']?>"><?=$menuHabitat['name']?></a></li>
                            <?php } ?>
                        </ul>
                    </li>
                <?php
                elseif($tag !== 'Habitats & Animaux' && !is_array($tag)): 
                // checks if the value $tag is not an array to return a simple button
                ?>
                    <li class="nav-item">
                        <?php if ($tag == 'Avis des visiteurs') { ?>
                        <a class="nav-link link-light position-relative" href="<?=BASE_URL.$url?>"><?= $tag?>
                        <?php if (isset($countUncheckedReviews) && $countUncheckedReviews > 0) { ?>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                <?= $countUncheckedReviews ?>
                                <span class="visually-hidden">nombre d'avis</span>
                            </span>
                        <?php } ?>
                        </a>
                        <?php } else {?>
                            <a class="nav-link link-light" href="<?=BASE_URL.$url?>"><?= $tag?></a>
                        <?php } ?>
                    </li>
                <?php else : 
                // the value $tag is an array, so the header displays a dropdown
                ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link link-light dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?= $url // the title of the dropdown ?> 
                        </a>
                        <ul class="dropdown-menu bg-arc-mint-green text-light">
                            <?php
                            foreach($tag as $subUrl => $subTag) {
                                ?>
                            <li><a class="dropdown-item" href="<?=BASE_URL.$subUrl?>"><?=$subTag?></a></li>
                            <?php } ?>
                        </ul>
                    </li>        
                <?php endif ?>
                <?php endforeach?>
        
                </ul>
                <?php if(!isset($_SESSION['userEmail'])) { ?>
                <a type="button" class="btn btn-outline-light me-2" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip" data-bs-title="Accès limité aux employés" href="login">
                Connexion staff</a>
                <?php } else {?>
                <a type="button" class="btn btn-outline-light me-2" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip" data-bs-title="Accès limité aux employés" href="logout">
                Déconnexion</a>
                <?php } ?>
            </div>
        </div>
    </nav>
        <?php if(isset($_SESSION["userEmail"])): ?>
            <div class="d-flex justify-content-center">
                <div class="bg-arc-dark mt-3 text-light p-1 rounded-3">
                    <?php echo 'Bienvenue ' .$_SESSION["userFirstName"]. '. Vous êtes connecté en tant que "' .$_SESSION["userRole"]. '".';?>
                </div>
            </div>
        <?php endif ?>
        <?php if(isset($_GET['success'])) { ?>
            <div class="d-flex justify-content-center mt-2">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fa-solid fa-check"></i> <?= $sucess[$_GET['success']]; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        <?php } else if(isset($_GET['error'])) { ?>
            <div class="d-flex justify-content-center mt-2">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fa-solid fa-check"></i> <?= $error[$_GET['error']]; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        <?php } ?>

</header>
