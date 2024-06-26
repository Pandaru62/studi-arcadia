<?php

require_once "./templates/header.php"; ?>

<div class="container mb-4 py-3">

    <section id="addService">

        <div class="row bg-arc-mint-green py-3 my-5">
            <div class="col">
                <h2>Ajouter un service</h2>

                <form method="POST" enctype="multipart/form-data" action="./views/addservicesprocess.php">
                    <div class="mb-3">
                        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">
                        <label for="serviceName" class="form-label">Nom du service</label>
                        <input class="form-control" id="serviceDescription" name="serviceName">
                    </div>
                    <div class="mb-3">
                        <label for="serviceDescription" class="form-label">Description du service</label>
                        <textarea class="form-control" id="serviceDescription" name="serviceDescription" rows="3">Tapez une description ici</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="file" class="form-label">Modifier la photo</label>
                        <input class="form-control" type="file" id="file" name="file">
                    </div>
                    <div class="mb-3">
                        <label for="isFree" class="form-label">Service gratuit ?</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="isFree" value="0" id="payingService">
                            <label class="form-check-label" for="payingService">
                            Non
                        </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="isFree" value="1" id="freeService">
                            <label class="form-check-label" for="freeService">
                            Oui
                            </label>
                        </div>
                    </div>

                    <input class="btn btn-arc-dark" name="addService" type="submit" value="Ajouter ce service"></input>

                </form>
                



            </div>
    </section>
</div>

<?php require_once "./templates/footer.php"; ?>
