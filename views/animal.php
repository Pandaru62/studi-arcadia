<?php
require_once "./templates/header.php";
?>


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
                <?php if(isset($_SESSION['userRole']) && $_SESSION['userRole'] == 'admin'): ?>
                    <div class="d-flex justify-content-center">
                        <a class="btn btn-warning me-2" href="<?=BASE_URL?>/editspecie?id=<?=$animal[0]['species_id'];?>"><i class="bi bi-pencil"></i> éditer l'espèce</a>
                        <!-- delete -->
                        <button type="button" class="btn btn-danger ms-2" data-bs-toggle="modal" data-bs-target="#deleteSpModal<?=$animal[0]['species_id']?>">
                            <i class="bi bi-trash-fill"></i> Supprimer l'espèce</a>
                        </button>
                    </div>
                    <!-- modal config : warning message before species is deleted -->
                    <div class="modal fade" id="deleteSpModal<?=$animal[0]['species_id'];?>" tabindex="-1" aria-labelledby="deleteSpModal<?=$animal[0]['species_id'];?>" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-arc-mint-green">
                                    <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">Supprimer l'espèce ?</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-dark">
                                    Voulez-vous vraiment supprimer l'espèce "<?= $animal[0]['speciesName']; ?>" ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-arc-dark" data-bs-dismiss="modal">Annuler</button>
                                    <form method="POST" enctype="multipart/form-data" action="<?=BASE_URL?>/controllers/Deletiontest.php">
                                        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">
                                        <input type="hidden" class="form-control" id="speciesId" name="speciesId" value="<?=$specie['id'];?>">
                                        <button class="btn btn-danger" name="deleteSpecies" type="submit">Supprimer</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                        <!-- end modal -->
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



    <section id="habitats">
        <div class="row bg-arc-mint-green py-3">
                <h2>Nos pensionnaires</h2>
            <div class="row g-0 px-2">
                <?php
                foreach ($animal as $ani):
                ?>
                <div class="col-12 col-md-6 pb-3 pe-md-2">
                    <div class="card card-habitat">
                        <img src="<?='./uploads/ANIMAUX/'.$ani['animalImage']?>" class="card-img-top-animal z-0" alt="<?=$ani['first_name'];?>">                    
                        <div class="card-body bg-light d-flex flex-column">
                            <h2><?=$ani['first_name']?></h2>

                            <?php if(isset($_SESSION) && isset($_SESSION['userRole'])): ?>
                            <div class="">
                                <a class="btn btn-info" href="<?=BASE_URL?>/show?animal=<?=$ani['animalId'];?>"><i class="bi bi-eye-fill"></i> Voir la fiche détaillée</a></td>
                                <?php if(($_SESSION['userRole']) !== 'vétérinaire') { ?>
                                <a class="btn btn-arc-dark" href="<?=BASE_URL?>/feeding?id=<?=$ani['animalId'];?>"><i class="fa-solid fa-carrot"></i> Nourrir l'animal</a></td>
                                <?php } elseif(($_SESSION['userRole']) !== 'employé') { ?>
                                <a class="btn btn-arc-dark" href="<?=BASE_URL?>/checkupanimal?animal=<?=$an['animalId'];?>"><i class="fa-solid fa-user-doctor"></i> Ajouter un avis médical</a></td>
                                <?php } ?>
                                <?php if(isset($_SESSION) && $_SESSION['userRole'] == 'admin'): ?>
                                <a class="btn btn-warning" href="<?=BASE_URL?>/editanimal?id=<?=$ani['animalId'];?>"><i class="bi bi-pencil"></i> éditer l'animal</a>
                                <!-- delete -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAniModal<?=$ani['animalId']?>">
                                    <i class="bi bi-trash-fill"></i> Supprimer l'animal</a>
                                </button>
                            </div>
                            <!-- modal config : warning message before animal is deleted -->
                            <div class="modal fade" id="deleteAniModal<?=$ani['animalId'];?>" tabindex="-1" aria-labelledby="deleteAniModal<?=$ani['animalId'];?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-arc-mint-green">
                                            <h1 class="modal-title fs-5 text-dark" id="modalLabel">Supprimer l'animal ?</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-dark">
                                            Voulez-vous vraiment supprimer l'animal "<?= $ani['first_name']; ?>" ?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-arc-dark" data-bs-dismiss="modal">Annuler</button>
                                            <form method="POST" enctype="multipart/form-data" action="<?=BASE_URL?>/controllers/Deletiontest.php">
                                                <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">
                                                <input type="hidden" class="form-control" id="animalId" name="animalId" value="<?=$ani['animalId'];?>">
                                                <button class="btn btn-danger" name="deleteAnimal" type="submit">Supprimer</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end modal -->
                            <?php else: ?>
                            </div>
                            <?php endif ?>
                            <?php endif ?>

                            <div class="bg-arc-secondary rounded-5 mt-3 p-3">
                                <h3 class="light-h3"><i class="fa-solid fa-user-doctor"></i> Le dernier avis du vétérinaire</h3>
                                <ul class="text-light">
                                    <li><u>Santé</u> : <?=$lastCheckUp[$ani['animalId']]['health'];?></li>
                                    <li><u>Nourriture conseillée</u> : <?=$lastCheckUp[$ani['animalId']]['food'];?></li>
                                    <li><u>Grammage</u> : <?=$lastCheckUp[$ani['animalId']]['quantity'];?></li>
                                    <li><u>Dernière visite</u> : <?=$lastCheckUp[$ani['animalId']]['date'];?></li>
                                    <li><u>Autres remarques</u> : <?=$lastCheckUp[$ani['animalId']]['opinion'];?></li>
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
    