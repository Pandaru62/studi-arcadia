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

        <h2>Explorer un habitat</h2>
        <?php foreach($menuHabitats as $menuHabitat) 
        {?>
        <div class="col-12 col-lg-4 pb-3">
            <div class="card card-habitat">
                <img src="uploads/habitats/<?= $menuHabitat["image"]; ?>" class="card-img-top-animal z-0" alt="marais">
                <div class="card-img-overlay d-flex align-items-start justify-content-center">
                    <h5 class="card-title text-light z-1"><a class="no-underline" href="#"><?= $menuHabitat["name"]; ?></a></h5>
                </div>                    
                <div class="card-body bg-light d-flex flex-column">
                    <?php if(isset($_SESSION['userEmail']) && $_SESSION['userRole'] == 'admin') {?>
                        <div class="d-flex justify-content-around mb-2">
                            <a class="btn btn-warning z-2" href="<?=BASE_URL?>/edithabitat?id=<?=$menuHabitat['id'];?>"><i class="bi bi-pencil"></i> Editer</a>                            
                            <button type="button" class="btn btn-danger z-2" data-bs-toggle="modal" data-bs-target="#deleteHabitat<?=$menuHabitat['id'];?>">
                            <i class="bi bi-trash-fill"></i> Supprimer
                            </button>
                            <!-- modal config : warning message before habitat deleted -->
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
                                        <form method="POST" enctype="multipart/form-data" action="<?=BASE_URL?>/controllers/Deletiontest.php">
                                            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">
                                            <input type="hidden" class="form-control" id="habitatId" name="habitatId" value="<?=$menuHabitat['id'];?>">
                                            <button class="btn btn-danger" name="deleteHabitat" type="submit">Supprimer</button>
                                        </form>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        
                        </div>
                    <?php } ?>
                    <p class="card-text z-1">
                        <?= $menuHabitat["description"]; ?>
                    </p>
                    <div class="d-flex flex-xl-row justify-content-around">
                        <button class="btn btn-arc-dark z-1 me-1" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMarais<?=$menuHabitat['id'];?>" aria-expanded="false" aria-controls="collapseMarais">
                            Visiter la page
                        </button>
                        <button class="btn btn-outline-arc-dark z-1" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMarais<?=$menuHabitat['id'];?>" aria-expanded="false" aria-controls="collapseMarais">
                            Voir les animaux <i class="fa-solid fa-arrow-down"></i>
                        </button>
                    </div>

                    <div class="collapse" id="collapseMarais<?=$menuHabitat['id'];?>">
                        <h4>Animaux de la zone :</h4>
                        <ul class="fa-ul">
                        <?php foreach($species as $specie):
                            if ($specie['habitat_id'] == $menuHabitat['id']) {?>
                            <li><span class="fa-li"><i class="fa-solid fa-paw"></i></span>
                                <a  class="link-arc-dark-green" href="/animal?species=<?=$specie["id"]?>"><?= $specie["name"];?></a>
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