<?php 
// require_once("controllers/habitats.php");
require_once("models/Habitats.view.php");
?>

<div class="row bg-arc-mint-green py-3">
    <h2>Explorer un habitat</h2>
    <div class="row g-0 px-2">
        <?php
        $habitats = new HabitatsView();
        $singleHabitats = $habitats->showHabitats();
        foreach ($singleHabitats as $habitat) { ?>

            <div class="col-12 col-md-4 pb-3 pe-md-2">
            <div class="card card-habitat">
                <img src="assets/habitats/<?=$habitat['image'];?>" class="card-img-top z-0" alt="<?=$habitat['name'];?>">                    
                <div class="card-body bg-light d-flex flex-column">
                    <a class="btn btn-arc-dark align-self-center z-1" href="<?=BASE_URL?>/showHabitat?habitat=<?=$habitat['id'];?>" type="button">
                    <?=$habitat['name'];?>
                    </a>
                </div>
            </div> 
        </div>

        <?php } // endforeach ?>
            
    </div>
</div>