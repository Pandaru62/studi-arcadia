<?php
require_once "./templates/header.php";
?>

<div class="container mb-4 py-3">

    <section id="commentHabitat">

        <div class="row bg-arc-mint-green py-3 my-5">
            <div class="col">
                <h2>Commenter un habitat</h2>
                <p>Merci de signaler tout problème lié à un habitat pouvant nécessiter une intervention.</p>
                <form method="POST" enctype="multipart/form-data" action="./views/commmenthabitatprocess.php">
                <div class="mb-3">
                        <input type="hidden" class="form-control" id="userId" name="userId" value="<?=$_SESSION['userId']?>">
                    </div>
                    <div class="mb-3">
                        <label for="commentHabitat" class="form-label">Choisissez l'habitat qui nécessite un commentaire :</label>
                        <select class="form-select mb-3" aria-label="Select species" id="commentHabitat" name="commentHabitat">
                            <?php foreach($habitats as $habitat): ?>
                            <option value="<?=$habitat['id']?>"><?=$habitat['name']?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="commentDescription" class="form-label">Commentaire :</label>
                        <textarea class="form-control" id="commentDescription" name="commentDescription" rows="3">Tapez une description ici</textarea>
                    </div>
                    <input class="btn btn-arc-dark" name="addHabitatComment" type="submit" value="Envoyer le commentaire"></input>

                </form>
                



            </div>
    </section>
</div>

<?php require_once "./templates/footer.php"; ?>
