<?php

require_once "./templates/header.php"; ?>

<div class="container mb-4 py-3">

    <section id="addhabitat">

        <div class="row bg-arc-mint-green py-3 my-5">
            <div class="col">
                <h2>Ajouter un nouvel habitat</h2>
                <?php if(isset($_GET['success'])) { ?>
                    <div class="d-flex">
                        <div class="alert alert-success" role="alert">
                            <i class="fa-solid fa-check"></i> <?= $sucess[$_GET['success']]; ?>
                        </div>
                    </div>
                <?php } else if(isset($_GET['error'])) { ?>
                    <div class="d-flex">
                        <div class="alert alert-danger" role="alert">
                            <i class="fa-solid fa-check"></i> <?= $sucess[$_GET['error']]; ?>
                        </div>
                    </div>
                <?php } ?>

                <form method="POST" enctype="multipart/form-data" action="./views/addhabitatprocess.php">
                    <div class="mb-3">
                        <label for="habitatName" class="form-label">Nom de l'habitat</label>
                        <input class="form-control" id="habitatName" name="habitatName">
                    </div>
                    <div class="mb-3">
                        <label for="habitatDescription" class="form-label">Description de l'habitat</label>
                        <textarea class="form-control" id="habitatDescription" name="serviceDescription" rows="3">Tapez une description ici</textarea>
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
