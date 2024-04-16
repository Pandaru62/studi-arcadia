<?php

require_once "templates/header.php";
require_once "lib/pdo.php";
require_once "habitat.php";
require_once "tools.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);


$id = $_GET["habitat"];

$habitats = getHabitatsById($pdo, intval($id));

?>

<div class="container my-md-4 py-3">
    <section id="habitat_top">

        <div class="row">
            <div class="col rect-upper-effect"></div>
        </div>
        <div class="row text-center pt-md-3 bg-arc-dark text-light">
            <div class="col-md-8">
                <h1 class="text-light text-center pb-2"><?= $habitats["id"==$id]['name']?></h1>
                <p class="py-3"><?= $habitats["id"==$id]['description']?></p>
            </div>
            <div class="col-md-4">
                <img src="assets/habitats/<?=$habitats["id"==$id]['image'];?>" class="img-fluid img-habitat">
            </div>
        </div>
        <div class="row bg-arc-dark">
            <div class="col rect-lower-effect"></div>
        </div>

        <div class="row bg-arc-mint-green pt-3">

            <section id="habitatPart">
                <h3><?=$habitats["id"==$id]['name'];?></h3>
                <div class="border border-3 border-arc-dark rounded-5 mb-3">
                    <div class="row text-center align-items-center g-0 pb-3">
                        <?php 
                        $species = getSpeciesByHabitat($pdo, $id);
                        foreach($species as $num => $specie): ?>
                        
                        <?php $folderPath = 'assets/ANIMAUX/'.substr_replace($habitats["id"==$id]['image'], '', -4).'/'.$specie['image'];
                                $randomImagePath = getRandomImageFromFolder($folderPath);?>                    
                            <div class="col-lg-4 py-3">
                                <img src="<?=$randomImagePath?>" alt="<?=$specie['name']?>" class="img-fluid img-habitat">
                                <h3 class="fw-normal"><?=$specie['name']?></h3>
                                <a class="btn btn-arc-dark align-self-center z-1" href="animal.php?id=<?=$specie['id']?>" type="button">
                                Consulter
                                </a>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </section>   
        </div>

        <?php require_once "habitat_explore.php"; ?>

</div>

<?php require_once "templates/footer.php"; ?>