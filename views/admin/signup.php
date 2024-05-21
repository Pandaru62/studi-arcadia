<?php
require_once "./templates/header.php";
?>

<div class="container mb-4 py-3">

    <section id="signup">

        <div class="row bg-arc-mint-green py-3 my-5">
            <div class="col-md-8">
                <h2>Inscrire un nouveau membre</h2>

                <form class="needs-validation" method="POST" enctype="multipart/form-data" action="./views/signupProcess.php" novalidate>
                    <div class="mb-3">
                        <label for="userLastName" class="form-label">Nom de famille :</label>
                        <input required type="text" class="form-control" id="userLastName" name="userLastName" placeholder="ex. Doe" maxlength="50">
                        <div class="invalid-feedback">
                            Veuillez remplir ce champ.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="userFirstName" class="form-label">Prénom :</label>
                        <input required type="text" class="form-control" id="userFirstName" name="userFirstName" placeholder="ex. John" maxlength="50">
                        <div class="invalid-feedback">
                            Veuillez remplir ce champ.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="userEmail" class="form-label">Email de connexion :</label>
                        <input required type="email" class="form-control" id="userEmail" name="userEmail" placeholder="user@email.fr" maxlength="100">
                        <div class="invalid-feedback">
                            L'e-mail n'est pas valide.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="userPassword" class="form-label">Mot de passe :</label>
                        <input required type="password" class="form-control" id="userPassword" name="userPassword" maxlength="100">
                        <div class="invalid-feedback">
                            Le mot de passe doit comporter au moins une majuscule, un chiffre et un caractère spécial.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="userRole" class="form-label">Rôle du nouveau membre :</label>
                        <select name="userRole" id="userRole" class="form-control">
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

<script src="./js/validation.js"></script>

<?php require_once "./templates/footer.php"; ?>
