<?php require_once('./lib/config.php'); ?>

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
                                <a class="nav-link link-light" href="<?=_MENU_PATH_.$link?>"><?= $title?></a>
                            </li>
                            <?php else:?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link link-light dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Habitats
                                    </a>
                                    <ul class="dropdown-menu bg-arc-mint-green text-light">
                                        <li><a class="dropdown-item" href="<?=_MENU_PATH_.$link;?>">Tous les habitats</a></li>
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

