<?php

require_once "./templates/header.php"; ?>

<div class="container mb-4 py-3">

    <section id="addhabitat">

        <div class="row bg-arc-mint-green py-3 my-5">
            <div class="col">
                <h2>Ajouter un nouvel habitat</h2>

                <form method="POST" enctype="multipart/form-data" action="./views/addhabitatprocess.php">
                    <div class="mb-3">
                        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">
                        <label for="habitatName" class="form-label">Nom de l'habitat</label>
                        <input class="form-control" id="habitatName" name="habitatName">
                    </div>
                    <div class="mb-3">
                        <label for="habitatDescription" class="form-label">Description de l'habitat</label>
                        <textarea class="form-control" id="habitatDescription" name="habitatDescription" rows="3">Tapez une description ici</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="file" class="form-label">Photo de l'habitat</label>
                        <input class="form-control" type="file" id="file" name="file">
                    </div>

                    <input class="btn btn-arc-dark" name="addHabitat" type="submit" value="Ajouter cet habitat"></input>

                </form>
                
            </div>
    </section>
</div>

<?php require_once "./templates/footer.php"; ?>
