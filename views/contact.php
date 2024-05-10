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
                <h1 class="text-light text-center pb-2">Contact</h1>
                <p class="py-3">Avez-vous des questions sur notre zoo ou nos animaux ? Souhaitez-vous planifier une visite ou organiser un événement spécial ? Ou peut-être avez-vous une réclamation que vous aimeriez nous faire part ? N'hésitez pas à nous contacter en utilisant le formulaire ci-dessous. Notre équipe sera ravie de vous aider !</p>
            </div>
            <div class="offset-md-1 col-md-3">
                <img src="assets/leaf.svg" class="img-fluid d-none d-md-block" style="opacity: 70%; height: 80%">
            </div>
        </div>
        <div class="row bg-arc-dark">
            <div class="col rect-lower-effect"></div>
        </div>


    </section>

    <section id="yourMessage">
        <div class="row bg-arc-mint-green py-3">
            <h2><i class="bi bi-pencil-square"></i> Votre message</h2>

            <form method="POST" enctype="multipart/form-data" action="./controllers/sendEmail.php">
                <div class="mb-3">
                    <label for="contactTitle" class="form-label">Titre du message :</label>
                    <input required type="text" class="form-control" id="contactTitle" name="contactTitle" placeholder="ex. Réclamation">
                </div>
                <div class="mb-3">
                    <label for="contactMessage" class="form-label">Votre message :</label>
                    <textarea class="form-control" id="contactMessage" name="contactMessage" rows="5">Tapez votre message ici.</textarea>
                </div>
                <div class="mb-3">
                    <label for="contactEmail" class="form-label">Votre adresse e-mail :</label>
                    <input required type="email" class="form-control" id="contactEmail" name="contactEmail" placeholder="ex : moi@email.com">
                </div>
                
                <input class="btn btn-arc-dark" name="ContactForm" type="submit" value="Envoyer ce message"></input>

            </form>
        </div>

</div>

<?php require_once "templates/footer.php"; ?>