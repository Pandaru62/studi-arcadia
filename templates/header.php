<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(file_exists('./lib/config.php')) {
    require_once('./lib/config.php');
} else {
require_once('../lib/config.php');
}

$title = "Arcadia - accueil" ?>

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

        <title><?=$title?></title>
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
                        <?php foreach($mainMenu as $link => $title):
                            if($title !== 'Habitats'):?>
                            <li class="nav-item">
                                <a class="nav-link link-light" href="<?=BASE_URL.$link?>"><?= $title?></a>
                            </li>
                            <?php else:?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link link-light dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Habitats
                                    </a>
                                    <ul class="dropdown-menu bg-arc-mint-green text-light">
                                        <li><a class="dropdown-item" href="<?=BASE_URL.$link;?>">Tous les habitats</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <?php
                                        // $habitats = new HabitatsView();
                                        // $singleHabitats = $habitats->showHabitats();
                                        // foreach ($singleHabitats as $habitat) { 
                                            ?>
                                        <li><a class="dropdown-item" href="<?=BASE_URL?>/showHabitat?habitat=1">Marais</a></li>
                                        <li><a class="dropdown-item" href="<?=BASE_URL?>/showHabitat?habitat=2">Jungle</a></li>
                                        <li><a class="dropdown-item" href="<?=BASE_URL?>/showHabitat?habitat=3">Savane</a></li>

                                        <?php 
                                        // } 
                                        ?>
                                    </ul>
                                </li>
                            <?php endif ?>
                        <?php endforeach?>
            
                    </ul>
                    <a type="button" class="btn btn-outline-light me-2"
                    data-bs-toggle="tooltip" data-bs-placement="bottom"
                    data-bs-custom-class="custom-tooltip"
                    data-bs-title="Accès limité aux employés"
                    href="login">
                    Connexion staff</a>
                </div>
            </div>
        </nav>
    </header>

