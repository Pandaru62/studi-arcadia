<?php
require_once "./templates/header.php";
?>

<div class="container mb-4 py-3">

    <section id="addCheckUp">

        <div class="row bg-arc-mint-green py-3 my-5">
            <div class="col-md-8">
                <h2>Ajouter un avis médical</h2>

                <form method="POST" enctype="multipart/form-data" action="./views/addCheckUpProcess.php">
                    <div class="mb-3">
                        <input required type="hidden" class="form-control" id="userId" name="userId" value="<?=$_SESSION['userId'];?>">
                    </div>
                    <div class="mb-3">
                        <label for="animalId" class="form-label">Prénom de l'animal :</label>
                        <select class="form-select mb-3" aria-label="Select animal" id="animalId" name="animalId">
                            <?php foreach($animals as $animal): ?>
                            <option value="<?=$animal['animalId']?>" <?php if(isset($animalCheckId) && $animalCheckId == $animal['animalId']) {echo ' selected="selected"';};?>
><?=$animal['first_name'].' ('.$animal['speciesName'].')';?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="animalHealth" class="form-label">Etat général de l'animal :</label>
                        <input required type="text" class="form-control" id="animalHealth" name="animalHealth">
                    </div>
                    <div class="mb-3">
                        <label for="animalFood" class="form-label">Nourriture conseillée :</label>
                        <input required type="text" class="form-control" id="animalFood" name="animalFood">
                    </div>
                    <div class="mb-3">
                        <label for="foodQuantity" class="form-label">Quantité de nourriture recommandée (en grammes) :</label>
                        <input required type="number" class="form-control" id="foodQuantity" name="foodQuantity">
                    </div>
                    <div class="mb-3">
                        <label for="checkUpDate" class="form-label">Date :</label>
                        <input required type="date" class="form-control" id="checkUpDate" name="checkUpDate">
                    </div>
                    <div class="mb-3">
                        <label for="animalOpinion" class="form-label">Avis ou autre information (facultatif) :</label>
                        <input type="text" class="form-control" id="animalOpinion" name="animalOpinion">
                    </div>
                    
                    <button class="btn btn-arc-dark" name="addCheckUp" type="submit">Ajouter ce compte rendu</button>

                </form>
            </div>
            <div class="col-md-4 d-flex justify-content-center align-self-center">
                <img class="img-fluid d-none d-md-flex" src="./assets/Logo_RedPanda2.png" alt="red panda">
            </div>
        </div>
    </section>
</div>

    <?php require_once"./templates/footer.php" ?>
