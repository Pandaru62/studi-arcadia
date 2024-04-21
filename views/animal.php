<?php

// error_reporting(E_ALL);
// ini_set('display_errors', 1);

require_once "./lib/function.php";
require_once "./templates/header.php";

?>

<div class="container-lg main-page"> 

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
                        <?php $imgPath = './assets/ANIMAUX/'.substr_replace($animal[0]['habitatImage'], '', -4).'/'.$animal[0]['speciesImage'].'/';
                        $randomImgPath = getRandomImageFromFolder($imgPath);?>   
                        <img src="<?=$randomImgPath?>"  alt="<?=$specie['speciesName']?>" class="img-fluid img-habitat">
                    </div>
                </div>
                <div class="row bg-arc-dark">
                    <div class="col rect-lower-effect"></div>
                </div>

            </section>

            <section id="habitats">
                <div class="row bg-arc-mint-green py-3">
                        <h2>Nos pensionnaires</h2>
                    <div class="row g-0 px-2">
                        <?php
                        foreach ($animal as $ani):
                        ?>
                        <div class="col-12 col-md-6 pb-3 pe-md-2">
                            <div class="card card-habitat">
                                <img src="<?='./assets/ANIMAUX/'.substr_replace($ani['habitatImage'], '', -4).'/'.$ani['speciesImage'].'/'.$ani['animalImage']?>" class="card-img-top z-0" alt="<?=$ani['first_name'];?>">                    
                                <div class="card-body bg-light d-flex flex-column">
                                    <h2><?=$ani['first_name']?></h2>
                                    <div class="bg-arc-secondary rounded-5 mt-3 p-3">
                                        <h3 class="light-h3"><i class="fa-solid fa-user-doctor"></i> L'avis du vétérinaire</h3>
                                        <ul class="text-light">
                                            <li>Santé : </li>
                                            <li>Nourriture conseillée : </li>
                                            <li>Grammage : </li>
                                            <li>Dernière visite : </li>
                                            <li>Autres remarques : </li>
                                        </ul>
                                    </div>
                                    <div class="bg-arc-secondary rounded-5 mt-3 p-3">
                                        <h3 class="light-h3"><i class="fa-solid fa-carrot"></i> Dernier nourrissage</h3>
                                        <ul class="text-light">
                                            <li><u>Date</u> : <?=$lastFeeding[$ani['animalId']]["date"]?></li>
                                            <li><u>Heure</u> : <?=$lastFeeding[$ani['animalId']]["time"]?></li>
                                            <li><u>Nourriture donnée</u> : <?=$lastFeeding[$ani['animalId']]["food"]?></li>
                                            <li><u>Grammage</u> : <?=$lastFeeding[$ani['animalId']]["quantity"]?> grammes</li>
                                        </ul>
                                    </div>
                                </div>
                            </div> 
                        </div>

                        <?php endforeach ?>

                    </div> 
                </div>

            </section>
            
            <?php require_once "habitats_explore.php"; ?>
            
            
        </div>
    </div>

    <?php require_once "templates/footer.php"; ?>