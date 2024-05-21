<?php

require_once "./templates/header.php"; ?>

<div class="container mb-4 py-3">

    <section id="signup">

        <div class="row bg-arc-mint-green py-3 my-3">
            <div class="col-md-8">
                <h2>Editer un service</h2>

                <form method="POST" enctype="multipart/form-data" action="./views/editserviceprocess.php">
                    <div class="mb-3">
                        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">
                        <input type="hidden" class="form-control" id="serviceId" name="serviceId" value="<?=$service["id"];?>">
                        <input type="hidden" class="form-control" id="currentImage" name="currentImage" value="<?=$service['image']?>">

                        <label for="serviceName" class="form-label">Nom du service</label>
                        <input class="form-control" id="serviceDescription" name="serviceName"  value="<?=$service["name"];?>">
                    </div>
                    <div class="mb-3">
                        <label for="isFree" class="form-label">Service gratuit ?</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="isFree" value="0" id="payingService" <?php if($service["isFree"]==0){echo "checked";}?>>
                            <label class="form-check-label" for="payingService">
                            Non
                        </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="isFree" value="1" id="freeService" <?php if($service["isFree"]==1){echo "checked";}?>>
                            <label class="form-check-label" for="freeService">
                            Oui
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="serviceDescription" class="form-label">Description du service</label>
                        <textarea class="form-control" id="serviceDescription" name="serviceDescription" rows="3"><?=$service["description"];?></textarea>
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
                        <label for="file" class="form-label">Ajouter une nouvelle photographie de l'animal</label>
                        <input class="form-control" type="file" id="file" name="file">
                    </div>
                    

                    <input class="btn btn-arc-dark" name="editService" type="submit" value="Modifier ce service"></input>

                </form>
                



            </div>
            <div class="col-sm-0 col-md-4  d-flex justify-content-center align-self-center">
            <img src="<?=_SERVICES_IMG_PATH_.$service["image"];?>" class="service-img"> 
        </div>
    </section>
</div>

<script src="js/script.js"></script>


<?php require_once "./templates/footer.php"; ?>
