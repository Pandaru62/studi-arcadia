<?php
require_once "./templates/header.php";
?>

<div class="container mb-4 py-3">
    <section id="feedAnimal">
        <div class="row bg-arc-mint-green py-3 my-5">
            <?php if(!isset($_GET['id'])): ?>
            <h2>Choisir un animal à nourrir :</h2>
            <?php else: ?>
            <h2>Nourrir un animal</h2>
            <p>Les champs sont pré-remplis conformément aux dernières recommandations du vétérinaire.</p>
            <div class="col-md-7 mb-4">
                <form method="POST" enctype="multipart/form-data" action="./views/feedAnimalProcess.php">
                    <fieldset disabled>
                        <div class="mb-3">
                            <label for="disabledInput" class="form-label">Nom de l'animal :</label>
                            <input class="form-control" type="text" id="disabledInput" name="feedingAnimal" value="<?php foreach($animals as $animal){if($_GET['id'] == $animal['animalId']){echo $animal['first_name'] . ' (' .$animal['speciesName']. ')';}};?>">
                        </div>
                    </fieldset>
                        <input class="form-control" type="hidden" id="feedingAnimalId" name="feedingAnimalId" value="<?php if(isset($_GET['id'])){echo $_GET['id'];};?>">
                    <div class="mb-3">
                        <label for="feedingDate" class="form-label">Date :</label>
                        <input class="form-control" type="date" id="feedingDate" name="feedingDate">
                    </div>
                    <div class="mb-3">
                        <label for="feedingTime" class="form-label">Heure :</label>
                        <input class="form-control" type="time" id="feedingTime" name="feedingTime">
                    </div>
                    <div class="mb-3">
                        <label for="feedingFood" class="form-label">Nourriture donnée :</label>
                        <input type="text" class="form-control" id="feedingFood" name="feedingFood" value="<?php if(!empty($lastVetCheckUp)){echo $lastVetCheckUp[0]['food'];};?>">
                    </div>
                    <div class="mb-3">
                        <label for="foodQuantity" class="form-label">Quantité de nourriture donnée (en grammes) :</label>
                        <input type="number" class="form-control" id="foodQuantity" name="foodQuantity" value="<?php if(!empty($lastVetCheckUp)){echo $lastVetCheckUp[0]['food_quantity'];};?>">
                    </div>
                    <input class="btn btn-arc-dark" name="feedAnimal" type="submit" value="Ajouter la nourriture"></input>
                </form>
            </div>
            <div class="col-md-5 d-flex align-items-center ">
                <img class="img-fluid d-none d-md-flex rounded-4" src="./uploads/ANIMAUX/<?php foreach($animals as $animal){if($_GET['id'] == $animal['animalId']){echo $animal['animalImage'];}};?>" alt="image animal">
            </div>
            <hr>
            <h2>Choisir un autre animal à nourrir : </h2>
            <?php endif ?>
            <div class="row">
                <label for="feedingAnimalSelect" class="form-label">Nom de l'animal :</label>
                <div class="col-md-8">
                    <select class="form-select mb-3" aria-label="Select animal" id="feedingAnimalSelect" name="feedingAnimal">
                        <?php foreach($animals as $animal): ?>
                        <option value="<?=$animal['animalId']?>" <?php if(isset($_GET['id'])) { if($animal['animalId'] == $_GET['id']) {echo " selected";}}?>><?=$animal['first_name'] . " (" . $animal['speciesName'] .")";?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="col-md-offset col-md-3">
                    <button id="feedingButton" class="btn btn-arc-dark">Nourrir cet animal</button>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Get today's date
        var today = new Date();

        // Format the date as "YYYY-MM-DD"
        var formattedDate = today.toISOString().split('T')[0];

        // Format the time as "HH:MM"
        var hours = ('0' + today.getHours()).slice(-2);
        var minutes = ('0' + today.getMinutes()).slice(-2);
        var formattedTime = hours + ':' + minutes;

        // Set the default value for the input fields
        var feedingDateInput = document.getElementById('feedingDate');
        var feedingTimeInput = document.getElementById('feedingTime');
        if (feedingDateInput) {
            feedingDateInput.value = formattedDate;
        }
        if (feedingTimeInput) {
            feedingTimeInput.value = formattedTime;
        }

        // Get reference to the button
        var feedingButton = document.getElementById('feedingButton');

        // Listen for click event on the button
        if (feedingButton) {
            feedingButton.addEventListener('click', function() {
                // Get the selected animal's ID from the dropdown
                var feedingAnimalSelect = document.getElementById('feedingAnimalSelect');
                var animalId = feedingAnimalSelect ? feedingAnimalSelect.value : '';

                console.log("Selected animal ID:", animalId);

                // Construct the URL with the animal's ID
                var url = "<?php echo BASE_URL ?>/feeding";

                // Add animalId parameter if it exists
                if (animalId !== '') {
                    url += "?id=" + animalId;
                }

                console.log("Redirecting to:", url);

                // Redirect to the constructed URL
                window.location.href = url;
            });
        }
    });
</script>




<?php require_once "./templates/footer.php"; ?>
