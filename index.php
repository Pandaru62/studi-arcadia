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

    <title>Document</title>
</head>
<body>

<?php
    define('_SERVICES_IMG_PATH_', 'uploads/services/');

    $mainMenu = [
        '/' => 'Accueil', 
        'habitats' => 'Habitats',
        'services' => 'Services',
        'contact' => 'Contact',
      ];
    
    $openingTimes = [
        'Tous les jours du lundi au vendredi : de 10h à 18h',
        'Le weekend, les vacances et les jours fériés : de 9h à 20h',
    ];
?>

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
                                <a class="nav-link link-light" href="<?=$link?>"><?= $title?></a>
                            </li>
                            <?php else:?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link link-light dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Habitats
                                    </a>
                                    <ul class="dropdown-menu bg-arc-mint-green text-light">
                                        <li><a class="dropdown-item" href="<?=$link;?>">Tous les habitats</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="habitat_single.php?habitat=1">Marais</a></li>
                                        <li><a class="dropdown-item" href="habitat_single.php?habitat=2">Jungle</a></li>
                                        <li><a class="dropdown-item" href="habitat_single.php?habitat=3">Savane</a></li>
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

    <div class="container-lg main-page"> 
        <main id="main-page">
            <!-- The content of the page will be added here -->
        </main>
    </div>

    <footer id="footer">
        <div class="bg-arc-dark px-3 pt-2 arc-footer">
            <div class="row d-none d-md-flex">
                <div class="col-md-4">
                    <p class="text-light arcadia-font">Zoo d'Arcadia<br>
                    <i class="fa-solid fa-phone"></i>
                    (+33) 03 20 12 12 15</p>
                </div>
                <div class="col-md-4 d-flex align-items-center justify-content-center">
                    <a href="#" class="text-light">Mentions légales</a>
                </div>
                <div class="col-md-4 d-flex align-items-end justify-content-end text-end fst-italic">
                    <p class="text-light fs-6">
                    <i class="fa-regular fa-clock"></i>
                        <?= $openingTimes[0]; ?><br/>
                        <?= $openingTimes[1]; ?></p>
                </div>
            </div>
            <div class="d-sm-flex d-md-none p-2 d-flex align-items-center justify-content-center">
                <p class="d-inline-flex gap-1">
                    <a class="btn btn-arc-dark" role="button" href="#collapsePhone" data-bs-toggle="collapse" aria-expanded="false" aria-controls="collapsePhone">
                    <i class="fa-solid fa-phone"></i>
                    </a>
                    <a href="#" class="text-light btn btn-arc-dark">Mentions légales</a>
                    <a class="btn btn-arc-dark" role="button" href="#collapseSchedule" data-bs-toggle="collapse" aria-expanded="false" aria-controls="collapseSchedule">
                        <i class="fa-regular fa-clock"></i>
                    </a>
                    <div class="collapse" id="collaspsePhone">
                        <div class="card card-body">
                            (+33) 03 20 12 12 15
                        </div>
                    </div>
                </p>
            </div>  
        </div>
    </footer>

    <script type="module" src="Router/router.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>

</body>
</html>