<?php
require_once "./templates/header.php";

?>

<div class="container mb-4 py-3">

    <section id="signup">

        <div class="row bg-arc-mint-green py-3 my-5">
            <div class="col-md-8">
                <h2>Ajouter un animal</h2>
                <?php if(isset($_GET['success'])) { ?>
                    <div class="d-flex">
                        <div class="alert alert-success" role="alert">
                            <i class="fa-solid fa-check"></i> <?= $sucess[$_GET['success']]; ?>
                        </div>
                    </div>
                <?php } else if(isset($_GET['error'])) { ?>
                    <div class="d-flex">
                        <div class="alert alert-danger" role="alert">
                            <i class="fa-solid fa-check"></i> <?= $error[$_GET['error']]; ?>
                        </div>
                    </div>
                <?php } ?>

                <form method="POST" enctype="multipart/form-data" action="./views/addAnimalProcess.php">
                    <div class="mb-3">
                        <label for="animalFirstName" class="form-label">Prénom de l'animal :</label>
                        <input required type="text" class="form-control" id="animalFirstName" name="animalFirstName">
                    </div>
                    <div class="mb-3">
                        <label for="animalSpecies" class="form-label">Espèce de l'animal :</label>
                        <select class="form-select mb-3" aria-label="Select species" id="animalSpecies" name="animalSpecies">
                            <?php foreach($species as $specie): ?>
                            <option value="<?=$specie['id']?>"><?=$specie['name']?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="mb-3" id="file">
                        <label for="file" class="form-label">Ajouter une nouvelle photographie de l'animal</label>
                        <input class="form-control" type="file" id="file" name="file">
                    </div>
                    
                    <button class="btn btn-arc-dark" name="addAnimalForm" type="submit">Ajouter</button>

                </form>
            </div>
            <div class="col-md-4 d-flex justify-content-center align-self-center">
                <img class="img-fluid d-none d-md-flex" src="./assets/Logo_RedPanda2.png" alt="red panda">
            </div>
        </div>
    </section>
</div>

    <?php require_once"./templates/footer.php" ?>
