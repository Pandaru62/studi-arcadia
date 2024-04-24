<?php 
require_once "templates/header.php";
?>

<div class="container my-md-4 py-3">
    <section id="error">
            
        <div class="row">
            <div class="col rect-upper-effect"></div>
        </div>
        <div class="row text-center pt-md-3 bg-arc-dark text-light">
            <div class="col-md-8">
                <h1 class="text-light text-center pb-2">Erreur 404</h1>
                <p class="py-3">Oups ! Il semble que l'animal que vous cherchez ait décidé de s'échapper dans la jungle numérique. 🌿🦁 Veuillez revenir à la page d'accueil et nous aider à le retrouver!</p>
                <p><a href="<?= BASE_URL ?>" class="btn btn-primary">Retour à l'accueil</a></p>
            </div>
            <div class="offset-md-1 col-md-3">
                <img src="assets/Logo_RedPanda1.png" class="img-fluid d-none d-md-block" style="opacity: 70%; height: 80%">
            </div>
        </div>
       

    </section>

</div>

<?php require_once "templates/footer.php"; ?>