<?php 
require_once "templates/header.php";
?>

<div class="container my-md-4 py-3">
    <section id="contact_top">
            
        <div class="row">
            <div class="col rect-upper-effect"></div>
        </div>
        <div class="row text-center pt-md-3 bg-arc-dark text-light">
            <div class="col-md-8">
                <h1 class="text-light text-center pb-2">Ajouter un avis</h1>
                <p class="py-3">Vos avis nous intéressent : notre équipe consulte régulièrement vos messages afin de nous améliorer.</p>
            </div>
            <div class="offset-md-1 col-md-3">
                <img src="assets/leaf.svg" class="img-fluid d-none d-md-block" style="opacity: 70%; height: 80%">
            </div>
        </div>
        <div class="row bg-arc-dark">
            <div class="col rect-lower-effect"></div>
        </div>
    </section>

    <section id="yourMessage" class="bg-arc-mint-green">

        <div class="row bg-arc-mint-green py-3">

        <div class="my-3">
            <?php 
            if (isset($_GET['sent']) && $_GET['sent'] == 'true') {
            ?>
                <div class="alert alert-success" role="alert">
                    <i class="fa-solid fa-check"></i> Votre message a bien été envoyé.
                </div>
            <?php 
            } else if (isset($_GET['sent']) && $_GET['sent'] == 'false') {
            ?>
                <div class="alert alert-danger" role="alert">
                    <i class="fa-solid fa-triangle-exclamation"></i> Une erreur s'est produite. Veuillez réessayer.
                </div>
            <?php 
            }
            ?>

        </div>

            <h2><i class="bi bi-pencil-square"></i> Votre message</h2>

            <form method="POST" enctype="multipart/form-data" action="./controllers/ProcessContactForm.php">
                <div class="mb-3">
                    <label for="visitorPseudo" class="form-label">Pseudo :</label>
                    <input type="text" class="form-control" id="visitorPseudo" name="visitorPseudo" placeholder="Votre pseudo">
                </div>
                <div class="mb-3">
                    <label for="visitorReview" class="form-label">Avis :</label>
                    <textarea class="form-control" id="visitorReview" name="visitorReview" rows="3">Donnez votre avis</textarea>
                </div>
                
                <input class="btn btn-arc-dark" name="ContactForm" type="submit" value="Envoyer ce message"></input>

            </form>
        </div>
    </section>

</div>

<?php require_once "templates/footer.php"; ?>