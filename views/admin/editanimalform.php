<?php
require_once "./templates/header.php";

?>

<div class="container mb-4 py-3">

    <section id="signup">

        <div class="row bg-arc-mint-green py-3 my-5">
            <div class="col-md-8">
                <h2>Editer un animal</h2>

                <form method="POST" enctype="multipart/form-data" action="./views/editAnimal.php">
                    <div class="mb-3">
                        <input type="hidden" class="form-control" id="animalId" name="animalId" value="<?=$animal[0]['animalId']?>">
                        <input type="hidden" class="form-control" id="currentImage" name="currentImage" value="<?=$animal[0]['animalImage']?>">
                    </div>
                    <div class="mb-3">
                        <label for="animalFirstName" class="form-label">Prénom de l'animal :</label>
                        <input required type="text" class="form-control" id="animalFirstName" name="animalFirstName" value="<?=$animal[0]['first_name']?>">
                    </div>
                    <div class="mb-3">
                        <label for="animalSpecies" class="form-label">Espèce de l'animal :</label>
                        <select class="form-select mb-3" aria-label="Select species" id="animalSpecies" name="animalSpecies">
                            <?php foreach($species as $specie): ?>
                            <option value="<?=$specie['id']?>" <?php if($animal[0]["species_id"] == $specie['id']) {echo "selected";}?>><?=$specie['name']?></option>
                            <?php endforeach ?>
                        </select>

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
                        <label for="file" class="form-label">Ajouter une nouvelle photographie de l'animal</label>
                        <input class="form-control" type="file" id="file" name="file">
                    </div>
                    
                    <button class="btn btn-arc-dark" name="editAnimalForm" type="submit">Modifier</button>

                </form>
            </div>
            <div class="col-md-4 d-flex justify-content-center align-self-center">
                <img class="img-fluid d-none d-md-flex rounded-4" src="./uploads/ANIMAUX/<?=$animal[0]['animalImage'];?>" alt="image animal">
            </div>
        </div>
    </section>
</div>

    <?php require_once"./templates/footer.php" ?>
