<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "./lib/function.php";

$title = $habitat[0]['name'];

require_once "./templates/header.php";
?>


<div class="container my-md-4 py-3">
    <section id="habitat_top">

        <div class="row">
            <div class="col rect-upper-effect"></div>
        </div>
        <div class="row text-center pt-md-3 bg-arc-dark text-light">
            <div class="col-md-8">
                <h1 class="text-light text-center pb-2"><?= $habitat[0]['name']?></h1>
                <p class="py-3"><?= $habitat[0]['description']?></p>
            </div>
            <div class="col-md-4">
                <img src="./uploads/habitats/<?=$habitat[0]['image'];?>" class="img-fluid img-habitat">
            </div>
        </div>
        <div class="row bg-arc-dark">
            <div class="col rect-lower-effect"></div>
        </div>

        <div class="row bg-arc-mint-green pt-3">

            <section id="habitatPart">
                <h3><?=$habitat[0]['name'];?></h3>
                    <div class="row text-center align-items-center g-0 pb-3">
                        <?php 
                        foreach($species as $num => $specie): ?>
                        
                        <?php $imagePath = './uploads/ANIMAUX/SPECIES/'.$specie['image'];?>                    
                            <div class="col-lg-4 py-3">
                                <img src="<?=$imagePath?>" alt="<?=$specie['name']?>" class="img-fluid img-habitat">
                                <h3 class="fw-normal"><?=$specie['name']?></h3>
                                <a class="btn btn-arc-dark align-self-center z-1" href="<?=BASE_URL?>/animal?species=<?=$specie['id']?>" type="button">
                                Consulter
                                </a>
                            </div>
                        <?php endforeach ?>

                    </div>
            </section> 
        </div>


        <?php require_once "habitats_explore.php"; ?>

</div>

<?php
require_once "./templates/footer.php";
?>
