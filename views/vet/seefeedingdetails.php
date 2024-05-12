<?php
 require_once "./templates/header.php";
?>
<div class="container mb-4 py-3">

  <ul class="nav nav-tabs mt-3">
    <li class="nav-item">
      <a class="nav-link <?php if($filter == "none") {echo "active";}?>" aria-current="page" href="<?= BASE_URL.'/seefeeding'; ?>">Toutes les sessions de nourrissage</a>
    </li>
    <li class="nav-item">
      <a class="nav-link <?php if($filter == "date") {echo "active";}?>" href="<?= BASE_URL.'/seefeeding?filter=date&sort=datenew&num=2024-05-02&pp=1'; ?>">Filtrer par date</a>
    </li>
    <li class="nav-item">
      <a class="nav-link <?php if($filter == "animal") {echo "active";}?>" href="<?= BASE_URL.'/seefeeding?filter=animal&sort=datenew&num=1&pp=1'; ?>">Filtrer par animal</a>
    </li>
  </ul>


  <h2>Rechercher l'historique de nourrissage par animal ou par date</h2>

  <div class="row">

    <div class="col-md-6">
      <form method="POST" enctype="multipart/form-data" action="./views/vet/searchFeedingProcess.php">
        <div class="mb-3">
          <label for="searchAnimal" class="form-label">Chercher un animal :</label>
          <select class="form-select mb-3" aria-label="Select animal" id="searchAnimal" name="searchAnimal">
              <?php foreach($animals as $animal): ?>
                <option value="<?=$animal['animalId']?>" <?php if(isset($id) && $animal["animalId"] == $id) {echo " selected";}?>><?=$animal['first_name']. ' ('.$animal['speciesName'].')';?></option>
              <?php endforeach ?>
          </select>

        </div>
        <input class="btn btn-arc-dark" name="searchAnimalForm" type="submit" value="Chercher">
      </form>
    </div>

    <div class="col-md-6">
      <form method="POST" enctype="multipart/form-data" action="./views/vet/searchFeedingProcess.php">
          <div class="mb-3">
              <label for="searchDate" class="form-label">Chercher par date</label>
              <input type="date" id="searchDate" class="form-control" name="searchDate">
          </div>
          <input class="btn btn-arc-dark" name="searchDateForm" type="submit" value="Chercher">
      </form>
    </div>


  </div>
  
                

  <h1>Historique des nourrissages</h1>

  <?php if ($numberFeeding > 0) : ?>
  <p>Il y a <?= $numberFeeding; ?> sessions de nourrissage<?php if($filter == "animal"){ echo " pour cet animal"; } elseif($filter == "date"){ echo " à cette date";} else{echo "";}?>.</p>
  <?php else : ?>
  <p>Aucun résultat n'a été retrouvé pour cette recherche.</p>
  <?php endif ?>

  <?php 
        if(isset($id)) {$extendedFilter = $filter.'&num='.$id;} else {$extendedFilter = $filter;}?>
  <nav aria-label="Page navigation">
    <ul class="pagination">
      <li class="page-item <?php if($currentPage<=1){echo 'disabled';}; ?>"><a class="page-link" href="<?=BASE_URL.'/seefeeding?filter='.$extendedFilter.'&sort=animalabc&pp='.$previousPage; ?>">Précédent</a></li>
      <?php if($currentPage != 1){?> 
        <li class="page-item"><a class="page-link" href="<?=BASE_URL.'/seefeeding?filter='.$extendedFilter.'&sort=animalabc&pp=1'?>">1</a></li>
        <?php } ?>
      <?php if($currentPage >2){?> 
        <li class="page-item disabled"><a class="page-link" href="#"> ... </a></li>
        <?php } ?>
        <?php if($currentPage != $pagesNumber){?> 
      <li class="page-item"><a class="page-link active" href="<?= BASE_URL.'/seefeeding?filter='.$extendedFilter.'&sort=animalabc&pp='.$currentPage; ?>"><?= $currentPage ?></a></li>
        <?php } ?>
      <?php if($currentPage < $pagesNumber && $currentPage +1 != $pagesNumber ){?>
        <li class="page-item"><a class="page-link" href="<?= BASE_URL.'/seefeeding?filter='.$extendedFilter.'&sort=animalabc&pp='.$nextPage; ?>"><?= $nextPage ?></a></li>
      <?php } ?>

      <li class="page-item disabled"><a class="page-link" href="#"> ... </a></li>
      <li class="page-item"><a class="page-link  <?php if($currentPage==$pagesNumber){echo 'active';}; ?>" href="<?= BASE_URL.'/seefeeding?filter='.$extendedFilter.'&sort=animalabc&pp='.$pagesNumber; ?>"><span><?=$pagesNumber?></span></a></li>
      <li class="page-item <?php if($currentPage==$pagesNumber){echo 'disabled';}; ?>"><a class="page-link" href="<?= BASE_URL.'/seefeeding?filter='.$extendedFilter.'&sort=animalabc&pp='.$nextPage; ?>">Suivant</a></li>
    </ul>
  </nav>

  <table class="table table-responsive table-hover">

      <thead class="fw-bold fs-4">
          <tr>
              <td>Espèce
                <a class="btn btn-sm btn-arc-dark" href="<?=BASE_URL.'/seefeeding?filter='.$extendedFilter.'&sort=specieabc&pp=1'; ?>"><i class="bi bi-sort-alpha-down"></i></a>
                <a class="btn btn-sm btn-arc-dark" href="<?=BASE_URL.'/seefeeding?filter='.$extendedFilter.'&sort=speciezyx&pp=1'; ?>"><i class="bi bi-sort-alpha-up"></i></i></a>
              </td>
              <td>Animal
                <a class="btn btn-sm btn-arc-dark" href="<?=BASE_URL.'/seefeeding?filter='.$extendedFilter.'&sort=animalabc&pp=1'; ?>"><i class="bi bi-sort-alpha-down"></i></a>
                <a class="btn btn-sm btn-arc-dark" href="<?=BASE_URL.'/seefeeding?filter='.$extendedFilter.'&sort=animalzyx&pp=1'; ?>"><i class="bi bi-sort-alpha-up"></i></i></a>
              </td>
              <td>
                Date 
                <a class="btn btn-sm btn-arc-dark" href="<?=BASE_URL.'/seefeeding?filter='.$extendedFilter.'&sort=datenew&pp=1'; ?>"><i class="bi bi-caret-down-fill"></i></a>
                <a class="btn btn-sm btn-arc-dark" href="<?=BASE_URL.'/seefeeding?filter='.$extendedFilter.'&sort=dateold&pp=1'; ?>"><i class="bi bi-caret-up-fill"></i></a>
              </td>
              <td>Heure</td>
              <td>Nourriture (grammage)</td>
          </tr>
      </thead>
      <tbody>
          <?php foreach($feedings as $singleFeeding) { ?>
          <tr>
              <td class="fw-bold"><?= $singleFeeding['speciesName']; ?></td>
              <td class="fw-bold"><?= $singleFeeding['first_name']; ?></td>
              <td><?= $singleFeeding['date']; ?></td>
              <td><?= $singleFeeding['time']; ?></td>
              <td><?= $singleFeeding['food'] . ' (' .$singleFeeding['quantity'].'gr.)'; ?></td>
          </tr>
          <?php } ?>
      </tbody>
  </table>

</div>

<?php require_once "./templates/footer.php";
?>