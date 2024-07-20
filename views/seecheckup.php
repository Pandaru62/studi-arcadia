<?php require_once "./templates/header.php"; ?>

<div class="container mb-4 py-3">

  <div  class="bg-light p-2 rounded-3">
    <h2>Rechercher un rapport de vétérinaire par animal ou par date</h2>

    <form id="searchForm">
      <div class="row">

        <div class="col-md-4">
          <div class="mb-3">
            <label for="searchSpecies" class="form-label">Chercher une espèce :</label>
            <select class="form-select mb-3" aria-label="Select species" id="searchSpecies" name="searchSpecies">
                <option selected="selected" value="">Choisir une espèce</option>
                <?php foreach($species as $specie): ?>
                  <option value="<?=$specie['id']?>"><?=$specie['name'];?></option>
                <?php endforeach ?>
            </select>
          </div>
        </div>
        <div class="col-md-4">
          <div class="mb-3">
            <label for="searchAnimal" class="form-label">Chercher un animal :</label>
            <select class="form-select mb-3" aria-label="Select animal" id="searchAnimal" name="searchAnimal">
                <option selected="selected" value="">Choisir un animal</option>
                <?php foreach($animals as $animal): ?>
                  <option value="<?=$animal['animalId']?>" <?php if(isset($id) && $animal["animalId"] == $id) {echo " selected";}?>><?=$animal['first_name']. ' ('.$animal['speciesName'].')';?></option>
                <?php endforeach ?>
            </select>
          </div>
        </div>
        <div class="col-md-4">
          <div class="mb-3">
            <label for="searchDate" class="form-label">Chercher par date</label>
            <input type="date" id="searchDate" class="form-control" name="searchDate">
          </div>
        </div>
        <div>
          <input class="btn btn-arc-dark" name="searchAnimalForm" type="submit" value="Chercher">
          <a href="/seecheckup" class="btn btn-outline-arc-dark">Réinitialiser</a>
        </div>
      </div>
    </form>

  </div>

  <hr class="border-arc-primary border-3 opacity-75">


  <h1>Historique des rapports de vétérinaire</h1>
  <p id="searchFeedback">Utilisez les filtres pour lancer une recherche.</p>

  <div  class="table-responsive">
    <table class="table table-hover">
      <thead class="fw-bold fs-4">
        <tr>
            <th scope="col">Animal
              <button id="animalAtoZ" class="btn btn-sm btn-outline-arc-dark" 
              data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip"
              data-bs-title="Ranger de A à Z">
                <i class="bi bi-sort-alpha-down"></i>
              </button>
              <button id="animalZtoA" class="btn btn-sm btn-outline-arc-dark" 
              data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip"
              data-bs-title="Ranger de Z à A">
                <i class="bi bi-sort-alpha-up"></i>
              </button>

            </th>
            <th scope="col">Date
              <button id="dateFromRecent" class="btn btn-sm btn-outline-arc-dark" 
              data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip"
              data-bs-title="Du plus récent">
                <i class="bi bi-caret-down-fill"></i>
              </button>
              <button id="dateFromOld" class="btn btn-sm btn-outline-arc-dark" 
              data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip"
              data-bs-title="Du plus ancien">
                <i class="bi bi-caret-up-fill"></i>
              </button>
            </th>
            <th scope="col">Etat</th>
            <th scope="col">Nourriture recommandée</th>
            <th scope="col">Vétérinaire</th>
            <th scope="col">Autres infos</th>
        </tr>
      </thead>
      <tbody id="checkups">
        <!-- Section to display checkups -->
      </tbody>
    </table>
  </div>

</div>

<script>
    const allCheckups = <?= $checkups ?>;
</script>
<script src="./js/checkupfilter.js"></script>

<?php require_once "./templates/footer.php"; ?>
