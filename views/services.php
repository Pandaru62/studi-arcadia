<?php $title = "Zoo d'Arcadia";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('./templates/header.php');

?>

<div class="container my-md-4 py-3">
    <section id="main_services">

    
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
        
        <div class="row">
            <div class="col rect-upper-effect"></div>
        </div>
        <div class="row text-center pt-md-3 bg-arc-dark text-light">
            <div class="col-md-8">
                <h1 class="text-light text-center pb-2">Nos services pour vous satisfaire</h1>
                <p class="py-3">Au zoo d'Arcadia, le bien-être de nos animaux importe autant que celui de nos visiteurs<br>
                Différents services vous sont proposés dans le parc afin de rendre votre journée inoubliable.</p>
                <h2 class="light-h3 text-center pb-2">Horaires</h2>
                <p class="py-3">
                <i class="fa-regular fa-clock"></i>
                <?= $openingTimes[0]; ?><br/>
                <?= $openingTimes[1]; ?></p>
            </div>
            <div class="offset-md-1 col-md-3">
                <img src="assets/leaf.svg" class="img-fluid d-none d-md-block" style="opacity: 70%; height: 80%">
            </div>
        </div>
        <div class="row bg-arc-dark">
            <div class="col rect-lower-effect"></div>
        </div>

    </section>
    <section id="services_list">

    
    <?php 
    foreach($services as $key => $service): ?>

        <div class="row bg-arc-mint-green pt-3">
            <div class="col-md-4 d-flex justify-content-center text-align-center">
                <img src="./uploads/services/<?=$service['image']?>" alt="<?=$service['name']?>" class="service-img">
            </div>
            <?php if(isset($_SESSION["userRole"]) && ($_SESSION["userRole"] == "employé" || $_SESSION["userRole"] == "admin")):?>
                <div class="col-md-1 d-flex flex-col flex-column justify-content-center">
                    <a href="<?=BASE_URL?>/editservice?service=<?=$service['id'];?>" class="btn btn-warning my-2"><i class="fa-regular fa-pen-to-square"></i> éditer</a>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteServiceModal<?=$service['id'];?>">
                    <i class="fa-solid fa-trash"></i> suppr.</button>
                        <!-- modal config : warning message before user deleted -->
                            <div class="modal fade" id="deleteServiceModal<?=$service['id'];?>" tabindex="-1" aria-labelledby="deleteServiceModal<?=$service['id'];?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header  bg-arc-mint-green">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Supprimer le service ?</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Voulez-vous vraiment supprimer ce service ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-arc-dark" data-bs-dismiss="modal">Annuler</button>
                                        <a type="button" class="btn btn-danger" href="<?=BASE_URL?>/deleteservice?id=<?=$service['id'];?>">Supprimer</a>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        <!-- end modal -->
                </div>
                <div class="col-md-7">
            <?php else:?>
                <div class="offset-md-1 col-md-7">
            <?php endif ?>
                <h2><?= $service['name'];?></h2>
                <?php if($service['isFree'] == 1):?>
                    <div class="pb-2">
                        <span class="text-light fw-bold bg-arc-dark py-1 px-2 mb-3 rounded-3"><i class="fa-regular fa-face-smile"></i> SERVICE GRATUIT</span>
                    </div>
                        <?php endif?>
                <p><?= $service['description']; ?></p>
            </div>
            <div class="py-4"><hr></div>
        </div>
            
    <?php endforeach ;?>
                        
    <?php if(isset($_SESSION["userRole"]) && ($_SESSION["userRole"] == "employé" || $_SESSION["userRole"] == "admin")):?>
    
    <div class="row bg-arc-mint-green p-3">
        <div class="py-3 my-3 d-flex align-items-center justify-content-center">
            <a class="btn btn-arc-dark rounded-5 btn-lg" href="<?BASE_URL?>/addservice.php">
                <i class="bi bi-plus-circle-fill"></i> 
                Ajouter un nouveau service
            </a>
        </div>
    </div>
        
    <?php endif ; ?>

        <div class="row bg-arc-mint-green pt-3">
            <div class="col rect-bottom-effect"></div>
        </div>

    </section>

</div>

<?php 
require_once('./templates/footer.php')
 ?>