<?php
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
                        <h1 class="text-light text-center pb-2"><?= $animal[0]['first_name']?></h1>
                        <p class="py-2">Espèce : "<?= $animal[0]['speciesName']?>".
                        <p class="py-2">L'animal se trouve dans l'habitat : <?= $animal[0]['habitatName']?></p>
                        <?php if(isset($_SESSION) && isset($_SESSION['userRole'])): ?>
                                    <div class="">
                                        <?php if(($_SESSION['userRole']) !== 'vétérinaire') { ?>
                                        <a class="btn btn-light" href="<?=BASE_URL?>/feeding?id=<?=$animal[0]['animalId'];?>"><i class="fa-solid fa-carrot"></i> Nourrir l'animal</a></td>
                                        <?php } elseif(($_SESSION['userRole']) !== 'employé') { ?>
                                        <a class="btn btn-light" href="<?=BASE_URL?>/checkupanimal?animal=<?=$animal[0]['animalId'];?>"><i class="fa-solid fa-user-doctor"></i> Ajouter un avis médical</a></td>
                                        <?php } ?>
                                    <?php if(isset($_SESSION) && $_SESSION['userRole'] == 'admin'): ?>
                                        <a class="btn btn-warning" href="<?=BASE_URL?>/editanimal?id=<?=$animal[0]['animalId'];?>"><i class="bi bi-pencil"></i> éditer l'animal</a>
                                        <!-- delete -->
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAniModal<?=$animal[0]['animalId']?>">
                                            <i class="bi bi-trash-fill"></i> Supprimer l'animal</a>
                                        </button>
                                    </div>
                                    <!-- modal config : warning message before species is deleted -->
                                    <div class="modal fade" id="deleteAniModal<?=$animal[0]['animalId'];?>" tabindex="-1" aria-labelledby="deleteAniModal<?=$animal[0]['animalId'];?>" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-arc-mint-green">
                                                    <h1 class="modal-title fs-5 text-dark" id="modalLabel">Supprimer l'animal ?</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-dark">
                                                    Voulez-vous vraiment supprimer l'animal "<?= $animal[0]['first_name']; ?>" ?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-arc-dark" data-bs-dismiss="modal">Annuler</button>
                                                    <a type="button" class="btn btn-danger" href="<?=BASE_URL?>/deletespecies?id=<?=$animal[0]['animalId'];?>">Supprimer</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end modal -->
                                    <?php else: ?>
                                    </div>
                                    <?php endif ?>
                                    <?php endif ?>
                    </div>
                    <div class="offset-md-1 col-md-3">
                        <img class="img-fluid img-habitat" src="./uploads/ANIMAUX/SPECIES/<?=$animal[0]['speciesImage'];?>"  alt="<?=$animal[0]['speciesName']?>">
                    </div>
                </div>
                <div class="row bg-arc-dark">
                    <div class="col rect-lower-effect"></div>
                </div>

            </section>

            <section id="lastnews">
                <div class="row bg-arc-mint-green pt-2 pb-4">
                        <h2>Aux dernières nouvelles</h2>
                    <div class="d-flex justify-content-evenly">

                        <!-- <div class="col-12 col-md-6 pb-3 pe-md-2"> -->
                            <div class="bg-arc-secondary rounded-5 mt-3 p-3 flex-fill me-3">
                                <h3 class="light-h3"><i class="fa-solid fa-user-doctor"></i> Le dernier avis du vétérinaire</h3>
                                <ul class="text-light">
                                    <li><u>Santé</u> : <?=$lastVetCheckUp[0]['health'];?></li>
                                    <li><u>Nourriture conseillée</u> : <?=$lastVetCheckUp[0]['food'];?></li>
                                    <li><u>Grammage</u> : <?=$lastVetCheckUp[0]['food_quantity'];?></li>
                                    <li><u>Dernière visite</u> : <?=$lastVetCheckUp[0]['date'];?></li>
                                    <li><u>Autres remarques</u> : <?=$lastVetCheckUp[0]['opinion'];?></li>
                                </ul>
                            </div>
                        <!-- </div> -->
                        <!-- <div class="col-12 col-md-6 pb-3 pe-md-2" style="height: auto;"> -->
                            <div class="bg-arc-secondary rounded-5 mt-3 p-3 flex-fill">
                                <h3 class="light-h3"><i class="fa-solid fa-carrot"></i> Dernier nourrissage</h3>
                                <ul class="text-light">
                                    <li><u>Date</u> : <?=$lastFeeding[0]['date'];?></li>
                                    <li><u>Heure</u> : <?=$lastFeeding[0]['time'];?></li>
                                    <li><u>Nourriture donnée</u> : <?=$lastFeeding[0]['food'];?></li>
                                    <li><u>Grammage</u> : <?=$lastFeeding[0]['quantity'];?> grammes</li>
                                </ul>
                            </div>
                        <!-- </div> -->
                    </div> 
                </div>

            </section>

            <section id="previous">
                <div class="row bg-arc-mint-green pt-2 pb-4">
                        <h2>Consulter les historiques de l'animal</h2>
                        <h3>Alimentation de l'animal</h3>
                    <div class="table-responsive ">
                        <table class="table table-bordered border-dark table-striped table-hover">
                          <thead class="table-dark">
                                <tr class="fw-bold">
                                    <td>Date</td>
                                    <td>Heure</td>
                                    <td>Nourriture</td>
                                    <td>Grammage</td>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <?php foreach($allFeeding as $singleFeeding) { ?>
                                <tr>
                                    <td><?=$singleFeeding['date']?></td>
                                    <td><?=$singleFeeding['time']?></td>
                                    <td><?=$singleFeeding['food']?></td>
                                    <td><?=$singleFeeding['quantity']?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                    <h3>Avis médicaux de l'animal</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered border-dark table-striped table-hover">
                            <thead class="table-dark">
                            <tr class="fw-bold">
                                    <td>Date</td>
                                    <td>Santé</td>
                                    <td>Nourriture (qté)</td>
                                    <td>Remarques</td>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <?php foreach($allCheckUps as $key => $singleCheckUp) { ?>
                                <tr>
                                    <td><?= $singleCheckUp['date']?></td>
                                    <td><?= $singleCheckUp['health']?></td>
                                    <td><?= $singleCheckUp['food']?> (<?= $singleCheckUp['food_quantity']?> gr.)</td>
                                    <td><?= $singleCheckUp['opinion']?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </section>
            
        </div>
    </div>

    <?php require_once "templates/footer.php"; ?>