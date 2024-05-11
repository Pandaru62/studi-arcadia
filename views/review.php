<?php 

require_once "templates/header.php";

if(!isset($_SESSION['$userEmail'])) {
?>


<div class="container my-md-4 py-3">
    <section id="contact_top">
            
        <div class="row">
            <div class="col rect-upper-effect"></div>
        </div>
        <div class="row text-center pt-md-3 bg-arc-dark text-light">
            <div class="col-md-8">
                <h1 class="text-light text-center pb-2">Ajouter un avis</h1>
                <p class="py-3">Vos avis nous intéressent : notre équipe consulte régulièrement vos messages afin de nous améliorer.<br> Voici nos derniers avis reçus.</p>

                <div id="carouselReviews" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <?php $first = true; ?>
                        <?php foreach($lastCheckedReviews as $lastCheckedReview): ?>
                            <div class="carousel-item <?php echo $first ? 'active' : ''; ?>">
                                <?php $first = false; ?>
                                <div class="card">
                                    <div class="card-header bg-arc-primary text-light d-flex justify-content-between align-items-center">
                                        <i class="fa-regular fa-user"></i>
                                        <span>@<?=$lastCheckedReview["pseudo"];?></span>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">"<?=$lastCheckedReview["message"];?>"</p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
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

            <h2><i class="bi bi-pencil-square"></i> Votre message</h2>

            <form method="POST" enctype="multipart/form-data" action="./controllers/ProcessContactForm.php">
                <div class="mb-3">
                    <label for="visitorPseudo" class="form-label">Pseudo :</label>
                    <input required type="text" class="form-control" id="visitorPseudo" name="visitorPseudo" placeholder="Votre pseudo">
                </div>
                <div class="mb-3">
                    <label for="visitorReview" class="form-label">Avis :</label>
                    <textarea required class="form-control" id="visitorReview" name="visitorReview" rows="3"></textarea>
                </div>
                
                <input class="btn btn-arc-dark" name="ContactForm" type="submit" value="Envoyer ce message"></input>

            </form>
        </div>
    </section>

</div>

<?php } ?>

<?php require_once "templates/footer.php"; ?>