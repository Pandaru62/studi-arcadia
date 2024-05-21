<?php

require_once "./templates/header.php";
?>

<div class="container-lg mb-4 py-3">
        <!-- Carousel -->
    <div class="d-flex d-md-block justify-content-center">
        <?php include_once("./templates/carousel.php"); ?>
    </div>
    <section id="welcome" class="mt-3">

        <div class="row">
            <div class="col rect-upper-effect"></div>
        </div>
        <div class="row text-center pt-3 bg-arc-dark text-light">
            <div class="col-md-8">
                <h1 class="text-light text-center pb-2">Bienvenue au Zoo d'Arcadia</h1>
                <p class="pt-3">Découvrez l'émerveillement au cœur de la mythique forêt de Brocéliande avec Arcadia,<br>
                le zoo où la nature et le respect des animaux se rejoignent harmonieusement.<br>
                Plongez dans un monde où la préservation de l'environnement est une priorité,<br>
                et où le bien-être des animaux est notre engagement quotidien.<br>
                Bienvenue dans un sanctuaire où la magie de la nature rencontre le bonheur des animaux,<br>
                pour une expérience inoubliable au sein de la biodiversité d'Arcadia.</p>
            </div>
            <div class="offset-md-1 col-md-3">
                <img src="assets/leaf.svg" class="img-fluid d-none d-md-block" style="opacity: 70%; height: 80%">
            </div>
        </div>
        <div class="row bg-arc-dark">
            <div class="col rect-lower-effect"></div>
        </div>

    </section>

    <!-- section habitats -->

    <?php require_once "./views/habitats_explore.php"; ?>

    <section id="facts">
        <div class="row bg-arc-mint-green">
            <div class="col rect-upper-effect"></div>
        </div>
        <div class="row text-center py-3 bg-arc-dark text-light">
            <div class="col-md-4 py-3">
                <i class="fa-solid fa-tree fs-1 text"></i>
                <p class="pt-3">Un espace naturel couvrant plusieurs milliers d'hectares de forêt.</p>
            </div>
            <div class="col-md-4 py-3">
                <i class="fa-solid fa-solar-panel fs-1 text text-light"></i>
                <p class="pt-3">Notre site utilise les énergies solaire et éolienne pour préserver la planète.</p>
            </div>
            <div class="col-md-4 py-3">
            <i class="fa-solid fa-user-doctor fs-1 text text-light"></i>
                <p class="pt-3">Nos soigneurs font plusieurs rondes quotidiennes pour s'assurer du bien-être de nos pensionnaires.</p>
            </div>
        </div>
        <div class="row text-center py-3 bg-arc-dark text-light">
            <div id="top-animal" class="col-md-8 py-3">
                <figure class="figure">
                    <img src="assets/panda-4836503_1920.jpg" alt="Panda roux" class="img-top-animal img-fluid">
                    <figcaption class="figure-caption">Rencontrez nos pandas roux.</figcaption>
                </figure>
            </div>
            <div class="col-md-4 py-3">
                <div class="bg-arc-mint-green rounded-5 rounded-top-0 h-100 p-3 text-arc-dark justify-content-center d-flex flex-column align-items-center">
                    <h3 class="pb-3">Fun fact:</h3>
                    <p>Les pandas roux, également connus sous le nom de "petits pandas" sont plus proches des ratons laveurs que des grands pandas. Ils sont  connus pour leur agilité dans les arbres, où ils se déplacent avec grâce grâce à leurs pattes agiles et à leur queue touffue, qui leur sert d'équilibreur.</p>
                    <a href="<?=BASE_URL?>/animal?species=14" class="btn btn-arc-dark">Accéder à la page des pandas roux</a>
                </div>
            </div>
        </div>
        <div class="row bg-arc-dark">
            <div class="col rect-lower-effect"></div>
        </div>
    </section>
    
    
    <section id="services" class="bg-arc-mint-green">
                <div class="row bg-arc-mint-green py-3">
                    <h2>Nos services</h2>
                    <p>Savourez votre journée en compagnie des animaux : nos employés sont aux petits soins pour vous proposer des services qui rendront votre expérience unique.</p>

                    <div class="row text-center align-items-center g-0 d-none d-lg-flex">
                    <?php 
                    foreach($services as $key => $service): ?>                    
                        <div class="col-lg-4 py-3">
                            <img src="<?=_SERVICES_IMG_PATH_.$service['image'];?>" alt="<?=$service['name'];?>" class="service-img">
                        <h3 class="fw-normal"><?=$service['name'];?></h3>
                        </div>
                    <?php endforeach ?>
                    
                    </div>
                    
                        <!-- Carousel on smaller screens -->
                    <div id="carouselExampleAutoplaying" class="carousel slide d-lg-none" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <?php foreach($services as $key => $service): ?>
                            <div class="carousel-item <?php if($key==1){echo " active";} ?>">
                                <div class="d-flex flex-column align-items-center justify-content-center"> <!-- Add classes -->
                                    <img src="<?=_SERVICES_IMG_PATH_.$service['image'];?>" alt="<?=$service['name'];?>" class="service-img">
                                    <h3 class="fw-normal text-center"><?=$service['name'];?></h3>
                                </div>
                            </div>
                            <?php endforeach ?>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                    

                    <p class="text-center pt-3"><a class="btn btn-arc-dark btn-lg" href="<?=BASE_URL?>/services">En savoir plus sur nos services »</a></p>
                </div>
            </section>


    <section id="contact">
        <div class="row bg-arc-mint-green">
            <div class="col rect-upper-effect"></div>
        </div>
        <div class="row bg-arc-dark pb-4">
            <h2 class="light-h2">Donnez votre avis</h2>
            <p class="text-light">Vos avis comptent pour nous : partagez votre expérience.</p>
            <div class="row g-0 text-center d-flex align-items-center">
                <div class="col-md-12 col-lg-3 text-light">
                    <a class="btn btn-arc-mint-green mb-3 btn-lg" href="<?=BASE_URL?>/review"><i class="bi bi-pencil-square"></i> Écrivez nous</a>
                    <ul class="list-inline my-2 fs-2 text">
                        <li class="list-inline-item">
                            <a href="#" class="text-decoration-none text-light"><i class="bi bi-youtube"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="text-decoration-none text-light"><i class="bi bi-instagram"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="text-decoration-none text-light"><i class="bi bi-twitter"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="text-decoration-none text-light"><i class="bi bi-facebook"></i></a>
                        </li>
                    </ul>
                </div>
                
                <div class="col-md-6 d-lg-none p-2">
                    <div class="card">
                        <div class="card-header bg-arc-primary text-light d-flex justify-content-between align-items-center">
                            <i class="fa-regular fa-user"></i>
                            <span>@<?=$reviews[0]["pseudo"];?></span>
                        </div>
                        <div class="card-body">
                            <p class="card-text">"<?=$reviews[0]["message"];?>"</p>
                        </div>
                    </div>
                </div>

                <div class="d-none d-lg-flex col-lg-5">
                    <div id="carouselReviews" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <?php $first = true; ?>
                            <?php foreach($lastCheckedReviews as $lastCheckedReview): ?>
                                <div class="carousel-item <?php echo $first ? 'active' : ''; ?>">
                                    <?php $first = false; ?>
                                    <div class="card">
                                        <div class="card-header bg-arc-primary text-light d-flex justify-content-between align-items-center">
                                            <i class="fa-regular fa-user"></i>
                                            <span>@<?=$lastCheckedReview["pseudo"];?></span>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text">"<?=$lastCheckedReview["message"];?>"</p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 px-2">
                <h3 class="light-h3"><i class="fa-regular fa-map"></i> Nous trouver</h3>                       
                    <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d21352.38877067888!2d-2.178005767221728!3d48.01277099625603!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sforet%20de%20broceliande!5e0!3m2!1sfr!2sfr!4v1710694787647!5m2!1sfr!2sfr" width="300" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
        
    </section>
</div>

<?php 
require_once "templates/footer.php";
?>
