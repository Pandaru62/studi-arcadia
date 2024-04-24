
<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once"./templates/header.php";

if (isset($_SESSION['userFirstName'])) {
    echo "bienvenue". $_SESSION["userFirstName"];
};?>

<div class="container mb-4 py-3">

    <?php if(!isset($_SESSION['userEmail'])) : ?>
    <div class="alert alert-warning mt-4" role="alert">
        <i class="fa-solid fa-triangle-exclamation"></i> Seuls les employés du zoo sont autorisés à se connecter.
    </div>
    <?php endif ?>

    <section id="login">

        <div class="row bg-arc-mint-green py-3 my-2">
            <h2>Se connecter</h2>
        
            <div class="col-md-8">
                <?php if(isset($_GET['error'])) : ?>
                <div class="d-flex">
                    <div class="alert alert-danger" role="alert">
                        <i class="fa-solid fa-triangle-exclamation"></i> <?= $error[$_GET['error']]; ?>
                    </div>
                </div>
                <?php endif ?>
                <form method="POST" enctype="multipart/form-data" action="./views/login.inc.php">
                    <div class="mb-3">
                        <label for="userEmail" class="form-label">Email de connexion :</label>
                        <input  type="email" class="form-control" id="userEmail" name="userEmail" placeholder="user@email.fr">
                    </div>
                    <div class="mb-3">
                        <label for="userPassword" class="form-label">Mot de passe :</label>
                        <input type="password" class="form-control" id="userPassword" name="userPassword">
                    </div>
                    
                    <input class="btn btn-arc-dark" name="loginForm" type="submit" value="Se connecter"></input>
                </form>
            </div>
            <div class="col-sm-0 col-md-4  d-flex justify-content-center align-self-center">
                <img class="" src="./assets/Logo_RedPanda2.png" alt="logo panda waving">
            </div>
        </div>
    </section>

    <!-- will be moved elsewhere  -->

    <section id="signup">

        <div class="row bg-arc-mint-green py-3 my-5">
            <h2>Inscrire un nouveau membre</h2>

            <form method="POST" enctype="multipart/form-data" action="./views/signup.php">
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
    </section>
</div>

    <?php require_once"./templates/footer.php" ?>
