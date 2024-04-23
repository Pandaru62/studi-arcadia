
<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once"./templates/header.php";

if (isset($_SESSION['userFirstName'])) {
    echo "bienvenue". $_SESSION["userFirstName"];
};?>

<div class="container mb-4 py-3">


    <div class="alert alert-warning mt-4" role="alert">
        <i class="fa-solid fa-triangle-exclamation"></i> Seuls les employés du zoo sont autorisés à se connecter.
    </div>

    <section id="login">

        <div class="row bg-arc-mint-green py-3 my-5">
            <h2>Se connecter</h2>

            <form method="POST" enctype="multipart/form-data" action="./views/login.inc.php">
                <div class="mb-3">
                    <label for="userEmail" class="form-label">Email de connexion :</label>
                    <input type="email" class="form-control" id="userEmail" name="userEmail" placeholder="user@email.fr">
                </div>
                <div class="mb-3">
                    <label for="userPassword" class="form-label">Mot de passe :</label>
                    <input type="password" class="form-control" id="userPassword" name="userPassword">
                </div>
                
                <input class="btn btn-arc-dark" name="loginForm" type="submit" value="Se connecter"></input>

            </form>
        </div>
    </section>

    <!-- will be moved elsewhere  -->

    <section id="signup">

        <div class="row bg-arc-mint-green py-3 my-5">
            <h2>Inscrire un nouveau membre</h2>

            <form method="POST" enctype="multipart/form-data" action="./views/signup.php">
                <div class="mb-3">
                    <label for="userLastName" class="form-label">Nom de famille :</label>
                    <input type="text" class="form-control" id="userLastName" name="userLastName" placeholder="ex. Doe">
                </div>
                <div class="mb-3">
                    <label for="userFirstName" class="form-label">Prénom :</label>
                    <input type="text" class="form-control" id="userFirstName" name="userFirstName" placeholder="ex. John">
                </div>
                <div class="mb-3">
                    <label for="userEmail" class="form-label">Email de connexion :</label>
                    <input type="email" class="form-control" id="userEmail" name="userEmail" placeholder="user@email.fr">
                </div>
                <div class="mb-3">
                    <label for="userPassword" class="form-label">Mot de passe :</label>
                    <input type="password" class="form-control" id="userPassword" name="userPassword">
                </div>
                <div class="mb-3">
                    <label for="userRole" class="form-label">Rôle du nouveau membre :</label>
                    <select name="userRole" id="userRole">
                        <option value="2">Vétérinaire</option>
                        <option value="3">Employé</option>
                    </select>
                </div>
                
                <button class="btn btn-arc-dark" name="signupForm" type="submit">Valider l'inscription</button>

            </form>
        </div>
    </section>
</div>

    <?php require_once"./templates/footer.php" ?>
