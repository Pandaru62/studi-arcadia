<?php
require_once "./templates/header.php";

?>

<div class="container mb-4 py-3">
 
    <section id="signup">

        <div class="row bg-arc-mint-green py-3 my-5">
            <div class="col-md-8">
                <h2>Modifier une espèce d'animal existante</h2>

                <form method="POST" enctype="multipart/form-data" action="./views/editSpeciesProcess.php">
                    <div class="mb-3">
                    <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">
                    <input required type="hidden" class="form-control" id="speciesId" name="speciesId" value="<?=$specie[0]['id']?>">
                    <input required type="hidden" class="form-control" id="currentImage" name="currentImage" value="<?=$specie[0]['image']?>">
                    </div>
                    <div class="mb-3">
                        <label for="speciesName" class="form-label">Nom de l'espèce :</label>
                        <input required type="text" class="form-control" id="speciesName" name="speciesName" value="<?=$specie[0]['name']?>">
                    </div>
                    <div class="mb-3">
                        <label for="speciesHabitat" class="form-label">Habitat de l'espèce :</label>
                        <select class="form-select mb-3" aria-label="Select species" id="speciesHabitat" name="speciesHabitat" value="<?=$specie[0]['habitat_id']?>">
                            <?php foreach($habitats as $habitat): ?>
                            <option value="<?=$habitat['id']?>" <?php if($habitat['id'] == $specie[0]['habitat_id']) {echo " selected";}?>><?=$habitat['name']?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="keepOrChangePhoto" class="form-label">Choix de la photo</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="keepOrChangePhoto" id="hideField" value="keep" checked>
                            <label class="form-check-label" for="keepPhoto">
                                Garder la photo actuelle
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="keepOrChangePhoto" id="showField" value="change">
                            <label class="form-check-label" for="changePhoto">
                                Changer de photo
                            </label>
                        </div>
                    </div>
                    <div class="mb-3" id="fieldContainer" style="display: none;">
                        <!-- if the admin decides to change the photo -->
                        <label for="file" class="form-label">Ajouter une nouvelle photographie de l'espèce</label>
                        <input class="form-control" type="file" id="file" name="file">
                    </div>
                    
                    <button class="btn btn-arc-dark" name="editSpeciesForm" type="submit">Modifier l'espèce</button>

                </form>
            </div>
            <div class="col-md-4 d-flex justify-content-center align-self-center">
                <img class="img-fluid d-none d-md-flex" src="./uploads/ANIMAUX/species/<?=$specie[0]['image']?>" alt="<?=$specie[0]['name']?>">
            </div>
        </div>
    </section>
</div>

<script src="js/script.js"></script>

    <?php require_once"./templates/footer.php" ?>
