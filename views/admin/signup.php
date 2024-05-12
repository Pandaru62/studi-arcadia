<?php
require_once "./templates/header.php";
?>

<div class="container mb-4 py-3">

    <section id="signup">

        <div class="row bg-arc-mint-green py-3 my-5">
            <div class="col-md-8">
                <h2>Inscrire un nouveau membre</h2>
                <?php if(isset($_GET['success'])) { ?>
                    <div class="d-flex">
                        <div class="alert alert-success" role="alert">
                            <i class="fa-solid fa-check"></i> <?= $sucess[$_GET['success']]; ?>
                        </div>
                    </div>
                <?php } ?>

                <form method="POST" enctype="multipart/form-data" action="./views/signupProcess.php">
                    <div class="mb-3">
                        <label for="userLastName" class="form-label">Nom de famille :</label>
                        <input required type="text" class="form-control" id="userLastName" name="userLastName" placeholder="ex. Doe">
                    </div>
                    <div class="mb-3">
                        <label for="userFirstName" class="form-label">Prénom :</label>
                        <input required type="text" class="form-control" id="userFirstName" name="userFirstName" placeholder="ex. John">
                    </div>
                    <div class="mb-3">
                        <label for="userEmail" class="form-label">Email de connexion :</label>
                        <input required type="email" class="form-control" id="userEmail" name="userEmail" placeholder="user@email.fr">
                    </div>
                    <div class="mb-3">
                        <label for="userPassword" class="form-label">Mot de passe :</label>
                        <input required type="password" class="form-control" id="userPassword" name="userPassword">
                    </div>
                    <div class="mb-3">
                        <label for="userRole" class="form-label">Rôle du nouveau membre :</label>
                        <select name="userRole" id="userRole">
                            <option value="2">Vétérinaire</option>
                            <option value="3" selected="selected">Employé</option>
                        </select>
                    </div>
                    
                    <button class="btn btn-arc-dark" name="signupForm" type="submit">Valider l'inscription</button>

                </form>
            </div>
            <div class="col-sm-0 col-md-4  d-flex justify-content-center align-self-center">
                <img class="" src="./assets/Logo_RedPanda2.png" alt="logo panda waving">
            </div>
        </div>
    </section>
</div>

    <?php require_once"./templates/footer.php" ?>
