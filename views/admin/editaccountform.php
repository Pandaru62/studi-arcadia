<?php
require_once "./templates/header.php";
?>

<div class="container mb-4 py-3">

    <section id="signup">

        <div class="row bg-arc-mint-green py-3 my-5">
            <div class="col-md-8">
                <h2>Editer un membre</h2>
                <?php if(isset($_GET['success'])) { ?>
                    <div class="d-flex">
                        <div class="alert alert-success" role="alert">
                            <i class="fa-solid fa-check"></i> <?= $sucess[$_GET['success']]; ?>
                        </div>
                    </div>
                <?php } else if(isset($_GET['error'])) { ?>
                    <div class="d-flex">
                        <div class="alert alert-danger" role="alert">
                            <i class="fa-solid fa-check"></i> <?= $sucess[$_GET['error']]; ?>
                        </div>
                    </div>
                <?php } ?>

                <form method="POST" enctype="multipart/form-data" action="./views/editUser.php">
                    <div class="mb-3">
                        <input type="hidden" class="form-control" id="userId" name="userId" value="<?=$user[0]['userId']?>">
                    </div>
                    <div class="mb-3">
                        <label for="userLastName" class="form-label">Nom de famille :</label>
                        <input required type="text" class="form-control" id="userLastName" name="userLastName" value="<?=$user[0]['last_name']?>">
                    </div>
                    <div class="mb-3">
                        <label for="userFirstName" class="form-label">Prénom :</label>
                        <input required type="text" class="form-control" id="userFirstName" name="userFirstName" value="<?=$user[0]['first_name']?>">
                    </div>
                    <div class="mb-3">
                        <label for="userEmail" class="form-label">Email de connexion :</label>
                        <input required type="email" class="form-control" id="userEmail" name="userEmail" value="<?=$user[0]['email']?>">
                    </div>
                    <div class="mb-3">
                        <label for="userPassword" class="form-label">Mot de passe :</label>
                        <div class="d-flex">
                        <div class="alert alert-warning" role="alert">
                            <i class="fa-solid fa-triangle-exclamation"></i> Toute modification d'information entraîne un changement de mot de passe.<br> Pensez à noter le nouveau mot de passe et à le communiquer.
                        </div>
                    </div>
                        <input required type="password" class="form-control" id="userPassword" name="userPassword">
                    </div>
                    <div class="mb-3">
                        <label for="userRole" class="form-label">Rôle de l'employé :</label>
                        <select name="userRole" id="userRole">
                            <option value="2">Vétérinaire</option>
                            <option value="3" <?php if($user[0]['name'] == "employé") {echo " selected='selected'";} ?>>Employé</option>
                        </select>
                    </div>
                    
                    <button class="btn btn-arc-dark" name="editAccountForm" type="submit">Modifier</button>

                </form>
            </div>
            <div class="col-sm-0 col-md-4  d-flex justify-content-center align-self-center">
                <img class="" src="./assets/Logo_RedPanda2.png" alt="logo panda waving">
            </div>
        </div>
    </section>
</div>

    <?php require_once"./templates/footer.php" ?>
