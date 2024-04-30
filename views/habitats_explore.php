<?php 
require_once("models/Habitats.view.php");

$habitats = new HabitatsView();
$singleHabitats = $habitats->showHabitats();

$species = new HabitatsView();
$species = $habitats->showSpecies();
?>

<div class="row bg-arc-mint-green py-3">

<section id="habitats">
    <div class="row bg-arc-mint-green py-3">
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
        <h2>Explorer un habitat</h2>
        <?php foreach($menuHabitats as $menuHabitat) 
        {?>
        <div class="col-12 col-lg-4 pb-3">
            <div class="card card-habitat">
                <img src="uploads/habitats/<?= $menuHabitat["image"]; ?>" class="card-img-top z-0" alt="marais">
                <div class="card-img-overlay d-flex align-items-start justify-content-center">
                    <h5 class="card-title text-light z-1"><?= $menuHabitat["name"]; ?></h5>
                </div>                    
                <div class="card-body bg-light d-flex flex-column">
                    <?php if(isset($_SESSION['userEmail']) && $_SESSION['userRole'] == 'admin') {?>
                        <div class="d-flex justify-content-around mb-2">
                            <a class="btn btn-warning z-2" href="<?=BASE_URL?>/edithabitat?id=<?=$menuHabitat['id'];?>"><i class="bi bi-pencil"></i> Editer</a>                            
                            <button type="button" class="btn btn-danger z-2" data-bs-toggle="modal" data-bs-target="#deleteHabitat<?=$menuHabitat['id'];?>">
                            <i class="bi bi-trash-fill"></i> Supprimer
                            </button>
                            <!-- modal config : warning message before user deleted -->
                            <div class="modal fade" id="deleteHabitat<?=$menuHabitat['id'];?>" tabindex="-1" aria-labelledby="deleteHabitat<?=$menuHabitat['id'];?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header  bg-arc-mint-green">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Supprimer l'habitat ?</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Voulez-vous vraiment supprimer l'habitat "<?= $menuHabitat['name'] ?>" ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-arc-dark" data-bs-dismiss="modal">Annuler</button>
                                        <a class="btn btn-danger z-2" href="<?=BASE_URL?>/deletehabitat?id=<?=$menuHabitat['id'];?>"><i class="bi bi-pencil"></i> Supprimer l'habitat</a>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        
                        </div>
                    <?php } ?>
                    <p class="card-text z-1"><?= $menuHabitat["description"]; ?>
                    <a class="text-arc-dark" href="<?=BASE_URL?>/showHabitat?habitat=<?=$menuHabitat['id'];?>" type="button">
                        Accéder à la page
                    </a>
                    </p>
                    <button class="btn btn-arc-dark align-self-end z-1" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMarais<?=$menuHabitat['id'];?>" aria-expanded="false" aria-controls="collapseMarais">
                        Voir les animaux
                    </button>
                    <div class="collapse" id="collapseMarais<?=$menuHabitat['id'];?>">
                        <h4>Animaux de la zone :</h4>
                        <ul class="fa-ul">
                        <?php foreach($species as $specie):
                            if ($specie['habitat_id'] == $menuHabitat['id']) {?>
                            <li><span class="fa-li"><i class="fa-solid fa-paw"></i></span>
                                <a  class="link-arc-dark-green" href="<?=BASE_URL?>/animal?species=<?=$specie["id"]?>"><?= $specie["name"];?></a>
                            </li>
                        <?php }
                        endforeach ?>
                        </ul>
                    </div> 

                </div>
            </div>
        </div>
        <?php 
        } ?>

    </div>
</section>
            
</div>