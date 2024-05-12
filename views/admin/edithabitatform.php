<?php require_once "./templates/header.php"; ?>

<div class="container mb-4 py-3">

    <section id="addhabitat">

        <div class="row bg-arc-mint-green py-3 my-5">
            <h2>Modifier un habitat</h2>
            <div class="col-md-8">

<form method="POST" enctype="multipart/form-data" action="./views/edithabitatprocess.php">
    <div class="mb-3">
        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">
        <input type="hidden" class="form-control" id="habitatId" name="habitatId" value="<?=$editedHabitat[0]['id']?>">
        <input type="hidden" class="form-control" id="currentImage" name="currentImage" value="<?=$editedHabitat[0]['image']?>">
    </div>
    <div class="mb-3">
        <label for="habitatName" class="form-label">Nom de l'habitat</label>
        <input class="form-control" id="habitatName" name="habitatName" value="<?=$editedHabitat[0]['name']?>">
    </div>
    <div class="mb-3">
        <label for="habitatDescription" class="form-label">Description de l'habitat</label>
        <textarea class="form-control" id="habitatDescription" name="habitatDescription" rows="3"> <?=$editedHabitat[0]['description']?></textarea>
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
        <label for="file" class="form-label">Ajouter une nouvelle photographie de l'habitat</label>
        <input class="form-control" type="file" id="file" name="file">
    </div>
    <input class="btn btn-arc-dark" name="editHabitat" type="submit" value="Modifier cet habitat">
</form>


            </div>
            <div class="col-md-4  d-flex align-items-center">
                <img class="img-fluid d-none d-md-block rounded-4" src="<?='uploads/habitats/'.$editedHabitat[0]['image']?>" alt="<?=$editedHabitat[0]['name']?>">
            </div>
        </div>

    </section>

</div>


<?php require_once "./templates/footer.php"; ?>
