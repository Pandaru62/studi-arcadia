
<?php
require_once "./templates/header.php";
?>

<div class="container mb-4 py-3">

    <section id="openingTimes">

        <div class="row bg-arc-mint-green py-3 my-2">
            <h2>Modifier les horaires</h2>
        
            <div class="col-md-8">

                <form method="POST" enctype="multipart/form-data" action="/controllers/editTimeController.php">
                    <div class="mb-3">
                        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">
                        <label for="time1" class="form-label">Ligne 1 :</label>
                        <input  type="text" class="form-control" id="time1" name="time1" value="<?= $times[1]; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="time1" class="form-label">Ligne 2:</label>
                        <input  type="text" class="form-control" id="time2" name="time2" value="<?= $times[2]; ?>">
                    </div>
                    
                    <input class="btn btn-arc-dark" name="timeForm" type="submit" value="Changer les horaires"></input>
                </form>
            </div>
            <div class="col-sm-0 col-md-4  d-flex justify-content-center align-self-center">
                <img class="" src="./assets/Logo_RedPanda2.png" alt="logo panda waving">
            </div>
        </div>
    </section>

</div>

    <?php require_once"./templates/footer.php" ?>
