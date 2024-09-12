<?php
require_once "./templates/header.php";
?>

<!-- ANIMAL - STEP 2 : implementation back-end -->

<div class="container my-md-4 py-3">
    <section id="animal_intro">
        
        <div class="row">
            <div class="col rect-upper-effect"></div>
        </div>
        <div class="row text-center pt-md-3 bg-arc-dark text-light">
            <div class="col-md-8">
                <h1 class="text-light text-center pb-2"><?= $animal[0]['speciesName']?></h1>
                <p class="py-2">Arcadia recense actuellement <?= count($animal); ?> espèces de "<?= $animal[0]['speciesName']?>".
                <p class="py-2">L'animal se trouve dans l'habitat : <?= $animal[0]['habitatName']?></p>
            </div>
            <div class="offset-md-1 col-md-3">
                <img class="img-fluid img-habitat" src="./uploads/ANIMAUX/SPECIES/heron.jpg"  alt="heron">
            </div>
        </div>
        <div class="row bg-arc-dark">
            <div class="col rect-lower-effect"></div>
        </div>

    </section>



    <section id="showAnimals">
        <div class="row bg-arc-mint-green py-3">
            <h2>Nos pensionnaires</h2>
            <div class="row g-0 px-2">
                <div class="col-12 col-md-6 pb-3 pe-md-2">
                    <div class="card card-habitat">
                        <img src="./uploads/ANIMAUX/archimede.jpg" class="card-img-top-animal z-0" alt="Archimède le Héron">
                        <div class="card-body bg-light d-flex flex-column">
                            <h2>Archimède</h2>
                        </div>
                           
                        <div class="bg-arc-secondary rounded-5 mt-3 p-3">
                            <h3 class="light-h3"><i class="fa-solid fa-user-doctor"></i> Le dernier avis du vétérinaire</h3>
                            <ul class="text-light">
                                <li><u>Santé</u> : Bonne santé</li>
                                <li><u>Nourriture conseillée</u> : Poisson</li>
                                <li><u>Grammage</u> : 200gr</li>
                                <li><u>Dernière visite</u> : 25/09/2024</li>
                                <li><u>Autres remarques</u> : RAS</li>
                            </ul>
                        </div>
                        <div class="bg-arc-secondary rounded-5 mt-3 p-3">
                            <h3 class="light-h3"><i class="fa-solid fa-carrot"></i> Dernier nourrissage</h3>
                            <ul class="text-light">
                                <li><u>Date</u> : 26/09/2024</li>
                                <li><u>Heure</u> : 08:12 ></li>
                                <li><u>Nourriture donnée</u> : Poisson</li>
                                <li><u>Grammage</u> : 210 grammes</li>
                            </ul>
                        </div>

                    </div> 
                </div>

                <div class="col-12 col-md-6 pb-3 pe-md-2">
                    <div class="card card-habitat">
                        <img src="./uploads/ANIMAUX/merlin.jpg" class="card-img-top-animal z-0" alt="Merlin le Héron">
                        <div class="card-body bg-light d-flex flex-column">
                            <h2>Merlin</h2>
                        </div>
                           
                        <div class="bg-arc-secondary rounded-5 mt-3 p-3">
                            <h3 class="light-h3"><i class="fa-solid fa-user-doctor"></i> Le dernier avis du vétérinaire</h3>
                            <ul class="text-light">
                                <li><u>Santé</u> : Très Bonne santé</li>
                                <li><u>Nourriture conseillée</u> : Poisson</li>
                                <li><u>Grammage</u> : 200gr</li>
                                <li><u>Dernière visite</u> : 25/09/2024</li>
                                <li><u>Autres remarques</u> : RAS</li>
                            </ul>
                        </div>
                        <div class="bg-arc-secondary rounded-5 mt-3 p-3">
                            <h3 class="light-h3"><i class="fa-solid fa-carrot"></i> Dernier nourrissage</h3>
                            <ul class="text-light">
                                <li><u>Date</u> : 26/09/2024</li>
                                <li><u>Heure</u> : 08:12 ></li>
                                <li><u>Nourriture donnée</u> : Poisson</li>
                                <li><u>Grammage</u> : 210 grammes</li>
                            </ul>
                        </div>
                        
                    </div>
                </div>

                <h2>Explorer un autre habitat</h2>

                <?php foreach($menuHabitats as $menuHabitat) {?>
                <a class="text-arc-dark btn btn-arc-dark text-light mb-2" href="<?=BASE_URL?>/showHabitat?habitat=<?=$menuHabitat['id'];?>" type="button">
                    <?=$menuHabitat['name'];?>
                </a><br>
                <?php }
                ?>
            </div>

        </div>

    </section>
</div>

<?php require_once "templates/footer.php"; ?>