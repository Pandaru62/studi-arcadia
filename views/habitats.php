<?php $title = "Habitats";

$user = 'employee';

require_once('./templates/header.php');
?>

<div class="container my-md-4 py-3">
    <section id="habitats_intro">
        
        <div class="row">
            <div class="col rect-upper-effect"></div>
        </div>
        <div class="row text-center pt-md-3 bg-arc-dark text-light">
            <div class="col-md-8">
                <h1 class="text-light text-center pb-2">Habitats</h1>
                <p class="py-3">Bienvenue dans la section habitats de notre zoo, où nous mettons en œuvre une approche tripartite pour garantir le bien-être optimal de nos résidents à fourrure, à plumes et à écailles. Comprendre les besoins distincts de chaque espèce est au cœur de notre mission, et c'est pourquoi nous avons développé trois habitats spécifiques qui offrent un environnement adapté à chaque groupe d'animaux. De la jungle luxuriante à la savane vaste, en passant par les mystérieux marais, notre zoo offre une diversité d'espaces conçus pour répondre aux besoins physiologiques, comportementaux et émotionnels de nos précieux pensionnaires. Préparez-vous à explorer et à découvrir les merveilles de ces habitats uniques, où le confort, la stimulation et la santé des animaux sont au premier plan de nos préoccupations.</p>
            </div>
            <div class="offset-md-1 col-md-3">
                <img src="assets/leaf.svg" class="img-fluid d-none d-md-block" style="opacity: 70%; height: 80%">
            </div>
        </div>
        <div class="row bg-arc-dark">
            <div class="col rect-lower-effect"></div>
        </div>

    </section>

    <section id="habitat">

        <?php
        include_once("habitats_explore.php");
        ?>
    </section>
    
</div>

<?php require_once "./templates/footer.php"; ?>

