<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "templates/header.php";

$title = "Zoo d'Arcadia"; ?>

        <!-- Carousel -->
        <section id="carousel" class="bg-arc-mint-green mt-md-2">
    <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="img-container">
                    <img src="assets/carrousel/elephant.jpg" class="d-block w-100" alt="elephants">
                </div>
                <div class="carousel-caption d-none d-md-block text-bottom">
                    <h5>Des animaux venant de tous horizons</h5>
                    <p>Découvrez trois mondes fidèles aux habitats naturels des animaux.</p>
                </div>
            </div>
            <div class="carousel-item">
                <div class="img-container">
                    <img src="assets/carrousel/solar-panel.jpg" class="d-block w-100" alt="solar panels">
                </div>
                <div class="carousel-caption d-none d-md-block">
                    <h5>Un cadre respectueux de la nature</h5>
                    <p>L'énergie est précieuse : le parc veille à préserver notre planète..</p>
                </div>
            </div>
            <div class="carousel-item">
                <div class="img-container">
                    <img src="assets/carrousel/suricates.jpg" class="d-block w-100" alt="suricates">
                </div>
                <div class="carousel-caption d-none d-md-block">
                    <h5>La santé avant tout</h5>
                    <p>Au zoo d'Arcadia, le bien-être de nos animaux est une priorité.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>
        <!-- Introduction -->

<div class="container my-4 py-3">
    <section id="welcome">

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

    <section id="habitats">
        <div class="row bg-arc-mint-green py-3">
            <h2>Trois mondes magiques à explorer</h2>
            <div class="col-12 col-md-4 pb-3">
                <div class="card card-habitat">
                    <img src="assets/habitats/marais.jpg" class="card-img-top z-0" alt="marais">
                    <div class="card-img-overlay d-flex align-items-start justify-content-center">
                        <h5 class="card-title text-light z-1">Les Marais de la Légende</h5>
                    </div>                    
                    <div class="card-body bg-light d-flex flex-column">
                        <p class="card-text z-1">Crocodiles et hippopotames se partagent les eaux sauvages bordant une majestueuse volière.</p>
                        <button class="btn btn-arc-dark align-self-end z-1" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMarais" aria-expanded="false" aria-controls="collapseMarais">
                            En voir plus
                        </button>
                        <div class="collapse" id="collapseMarais">
                            <h4>Animaux de la zone :</h4>
                            <ul class="fa-ul">
                                <li><span class="fa-li"><i class="fa-solid fa-paw"></i></span>Faucon pélerin</li>
                                <li><span class="fa-li"><i class="fa-solid fa-paw"></i></span>Buse à queue rousse</li>
                                <li><span class="fa-li"><i class="fa-solid fa-paw"></i></span>Aigle royal</li>
                                <li><span class="fa-li"><i class="fa-solid fa-paw"></i></span>Epervier d'Europe</li>
                                <li><span class="fa-li"><i class="fa-solid fa-paw"></i></span>Crocodile</li>
                                <li><span class="fa-li"><i class="fa-solid fa-paw"></i></span>Hippopotame</li>
                                <li><span class="fa-li"><i class="fa-solid fa-paw"></i></span>Castor</li>
                                <li><span class="fa-li"><i class="fa-solid fa-paw"></i></span>Héron</li>
                                <li><span class="fa-li"><i class="fa-solid fa-paw"></i></span>Flamand Rose</li>
                            </ul>
                        </div> 
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4 pb-3">
                <div class="card card-habitat">
                    <img src="assets/habitats/jungle.jpg" class="card-img-top z-0" alt="jungle">
                    <div class="card-img-overlay d-flex align-items-start justify-content-center">
                        <h5 class="card-title text-light z-1">La jungle aux Merveilles</h5>
                    </div>
                    <div class="card-body bg-light d-flex flex-column">
                        <p class="card-text z-1">Une forêt luxuriante où panthères, pandas roux et lémuriens cohabitent près d'un imposant vivarium.</p>

                        <button class="btn btn-arc-dark align-self-end z-1" type="button" data-bs-toggle="collapse" data-bs-target="#collapseJungle" aria-expanded="false" aria-controls="collapseJungle">
                            En voir plus
                        </button>
                        <div class="collapse" id="collapseJungle">
                            <h4>Animaux de la zone :</h4>
                            <ul class="fa-ul">
                                <li><span class="fa-li"><i class="fa-solid fa-paw"></i></span>Couleuvre vipérine</li>
                                <li><span class="fa-li"><i class="fa-solid fa-paw"></i></span>Boa constrictor</li>
                                <li><span class="fa-li"><i class="fa-solid fa-paw"></i></span>Python</li>
                                <li><span class="fa-li"><i class="fa-solid fa-paw"></i></span>Panthère noire</li>
                                <li><span class="fa-li"><i class="fa-solid fa-paw"></i></span>Panda roux</li>
                                <li><span class="fa-li"><i class="fa-solid fa-paw"></i></span>Lémurien</li>
                            </ul>
                        </div> 
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4 pb-3">
                <div class="card card-habitat">
                    <img src="assets/habitats/savane.jpg" class="card-img-top z-0" alt="savane">
                    <div class="card-img-overlay d-flex align-items-start justify-content-center">
                        <h5 class="card-title text-light z-1">La Savane des Obis</h5>
                    </div>
                    <div class="card-body bg-light d-flex flex-column">
                        <p class="card-text z-1">Plongez au coeur d'un monde aride où girafes, zèbres, suricates et lions trônent et n'attendent que vous.</p>

                        <button class="btn btn-arc-dark align-self-end z-1" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSavana" aria-expanded="false" aria-controls="collapseSavana">
                            En voir plus
                        </button>
                        <div class="collapse" id="collapseSavana">
                            <h4>Animaux de la zone :</h4>
                            <ul class="fa-ul">
                                <li><span class="fa-li"><i class="fa-solid fa-paw"></i></span>Girafe</li>
                                <li><span class="fa-li"><i class="fa-solid fa-paw"></i></span>Zèbre</li>
                                <li><span class="fa-li"><i class="fa-solid fa-paw"></i></span>Suricate</li>
                                <li><span class="fa-li"><i class="fa-solid fa-paw"></i></span>Lion</li>                            
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
                    <img src="assets/ANIMAUX/JUNGLE/panda-4836503_1920.jpg" alt="Panda roux" class="img-top-animal img-fluid">
                    <figcaption class="figure-caption">Partez à la rencontre de nos pandas roux.</figcaption>
                </figure>
            </div>
            <div class="col-md-4 py-3">
                <div class="bg-arc-mint-green rounded-5 rounded-top-0 h-100 p-3 text-arc-dark justify-content-center d-flex flex-column align-items-center">
                    <h3 class="pb-3">Fun fact:</h3>
                    <p>Les pandas roux, également connus sous le nom de "petits pandas", ne sont pas de vrais pandas, mais plutôt des membres de la famille des mustélidés, plus proches des ratons laveurs que des grands pandas. Leur pelage roux et leur visage mignon en font des créatures adorables, mais ils sont également connus pour leur agilité dans les arbres, où ils se déplacent avec grâce grâce à leurs pattes agiles et à leur queue touffue, qui leur sert d'équilibreur.</p>
                    <a href="#" class="btn btn-arc-dark">Accéder à la page des pandas roux</a>
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
            <div class="col-lg-4 py-3 text-center">
                <img src="assets/services/train.jpg" alt="train" class="service-img">
            <h3 class="fw-normal">Petit train</h2>
            <p>Explorez notre parc à bord de notre charmant petit train, une manière relaxante et divertissante de découvrir les trésors cachés de la forêt de Brocéliande et d'admirer nos merveilleux pensionnaires sous un nouvel angle.</p>
            <p><a class="btn btn-arc-dark" href="#">En savoir plus »</a></p>
            </div>

            <div class="col-lg-4 bg-arc-mint-green py-3 text-center">
                <img src="assets/services/fauconnier.jpg" alt="fauconnier" class="service-img">
                <h3 class="fw-normal">Visites guidées</h2>
                <p>Pour une expérience encore plus enrichissante, nos visites guidées vous emmènent dans un voyage captivant à travers les différents habitats de nos animaux. Nos guides passionnés partageront avec vous des connaissances fascinantes sur nos résidents, tout en mettant l'accent sur notre engagement envers le respect de l'environnement et le bien-être animal. Rejoignez-nous pour une aventure mémorable, où chaque moment est une découverte.</p>
                <p><a class="btn btn-arc-dark" href="#">En savoir plus »</a></p>
            </div>

            <div class="col-lg-4 py-3 text-center">
                <img src="assets/services/restaurant.jpg" alt="restaurant" class="service-img">
                <h3 class="fw-normal">Restauration</h2>
                <p>Plongez dans une aventure unique au zoo Arcadia, où chaque visiteur est choyé avec une gamme de services exceptionnels. Notre espace de restauration propose une variété de délices culinaires, allant des snacks rapides aux repas gastronomiques, pour ravir les papilles des petits et des grands aventuriers.</p>
                <p><a class="btn btn-arc-dark" href="#">En savoir plus »</a></p>
            </div>
        </div>
    </section>

    <section id="contact">
        <div class="row bg-arc-mint-green">
            <div class="col rect-upper-effect"></div>
        </div>
        <div class="row bg-arc-dark pb-4">
            <h2 class="light-h2">Restons en contact</h2>
            <p class="text-light">Vos avis comptent pour nous : partagez votre expérience.</p>
            <div class="row g-0 text-center d-flex align-items-center">
                <div class="col-md-3 text-light">
                    <a class="btn btn-arc-mint-green mb-3 btn-lg" href="contact.php"><i class="bi bi-pencil-square"></i> Écrivez nous</a>
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
                
                <div class="col-md-5 p-2">
                    <div class="card">
                        <div class="card-header bg-arc-primary text-light d-flex justify-content-between align-items-center">
                            <i class="fa-regular fa-user"></i>
                            <span>@Marc</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Une incroyable journée !</h5>
                            <p class="card-text">"Quelle journée incroyable au zoo ! Les animaux étaient si fascinants à observer, et j'ai tellement appris sur la diversité de notre belle planète. C'était une expérience qui a vraiment égayé ma journée et renforcé mon amour pour la nature. 🌿🦁 #Gratitude #BelleJournée"</p>
                        </div>
                        </div>
                </div>

                <div class="col-md-4 px-2">
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

