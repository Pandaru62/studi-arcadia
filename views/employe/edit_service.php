<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "./templates/header.php"; ?>

<div class="container mb-4 py-3">

    <section id="signup">

        <div class="row bg-arc-mint-green py-3 my-5">
            <div class="col-md-8">
                <h2>Editer un service</h2>
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

                <form method="POST" enctype="multipart/form-data" action="./views/editserviceprocess.php">
                    <div class="mb-3">
                        <input type="hidden" class="form-control" id="serviceId" name="serviceId" value="<?=$service["id"];?>">
                    </div>
                    <div class="mb-3">
                        <label for="serviceName" class="form-label">Nom du service</label>
                        <input class="form-control" id="serviceDescription" name="serviceName"  value="<?=$service["name"];?>">
                    </div>
                    <div class="mb-3">
                        <label for="serviceDescription" class="form-label">Description du service</label>
                        <textarea class="form-control" id="serviceDescription" name="serviceDescription" rows="3"><?=$service["description"];?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="file" class="form-label">Modifier la photo</label>
                        <input class="form-control" type="file" id="file" name="file">
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

                    <input class="btn btn-arc-dark" name="editService" type="submit" value="Modifier ce service"></input>

                </form>
                



            </div>
            <div class="col-sm-0 col-md-4  d-flex justify-content-center align-self-center">
            <img src="<?=_SERVICES_IMG_PATH_.$service["image"];?>" class="service-img"> 
        </div>
    </section>
</div>

<?php require_once "./templates/footer.php"; ?>
