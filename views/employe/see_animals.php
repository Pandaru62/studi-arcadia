<?php
require_once "./templates/header.php"; ?>


<div class="container mb-4 py-3">

    <section id="animalList">

        <div class="row bg-arc-mint-green pt-3 mt-1">

            <h2>Rechercher une espèce ou un animal</h2>
                   
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="searchSpeciesBar" class="form-label">Chercher une espèce</label>
                    <input type="text" id="searchSpeciesBar" class="form-control" placeholder="Entrez le nom d'une espèce">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="searchAnimalsBar" class="form-label">Chercher un animal</label>
                    <input type="text" id="searchAnimalsBar" class="form-control" placeholder="Entrez un prénom d'animal ou le nom d'une espèce">
                </div>
            </div>
        
        </div>
        
        <div class="row bg-arc-mint-green pt-3 mb-1">

            <h2>Voir toutes les espèces</h2>
            <p>
                <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseSpecies" role="button" aria-expanded="false" aria-controls="collapseSpecies">
                Voir toutes les espèces</a>
                <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseAnimals" role="button" aria-expanded="false" aria-controls="collapseAnimals">
                Voir tous les animaux</a>
            </p>
            <div class="collapse" id="collapseSpecies" data-bs-parent="#accordion">
                <div class="table-responsive">
                    <table class="table table-success table-striped align-middle" id="speciesTable">
                        <thead class="table-dark fw-bold">
                            <tr class=" text-center">
                                <td>Nom de l'espèce</td>
                                <td>Nombre d'animaux</td>
                                <td>Consulter</td>
                                <td>Editer</td>
                                <td>Supprimer</td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($species as $specie): ?>
                            <tr class="text-center">
                                <td><?=$specie['name']?></td>
                                <td>x<?=$specie['animal_count']?></td>
                                <td><a class="btn btn-info" href="<?=BASE_URL?>/animal?species=<?=$specie['id'];?>"><i class="bi bi-eye-fill"></i> Voir la page</a></td>
                                <!-- edit -->
                                <td><a class="btn btn-warning" href="<?=BASE_URL?>/editspecie?id=<?=$specie['id'];?>"><i class="bi bi-pencil"></i> Editer</a></td>
                                <td> <!-- delete -->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteSpModal<?=$specie['id'];?>">
                                        <i class="bi bi-person-dash"></i> Supprimer
                                    </button>
                                    <!-- modal config : warning message before animal is deleted -->
                                    <div class="modal fade" id="deleteSpModal<?=$specie['id'];?>" tabindex="-1" aria-labelledby="deleteSpModal<?=$specie['id'];?>" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header  bg-arc-mint-green">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Supprimer l'espèce ?</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Voulez-vous vraiment supprimer l'espèce "<?= $specie['name']; ?>" ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-arc-dark" data-bs-dismiss="modal">Annuler</button>
                                                <a type="button" class="btn btn-danger" href="<?=BASE_URL?>/deletespecies?id=<?=$specie['id'];?>">Supprimer</a>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end modal -->
                                </td>
                            </tr>
                        <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="collapse" id="collapseAnimals" data-bs-parent="#accordion">
                    
                <div class="table-responsive">
                    <table class="table table-success table-striped align-middle" id="animalTable">
                        <thead class="table-dark fw-bold">
                            <tr class=" text-center">
                                <td>Nom de l'animal</td>
                                <td>Espèce</td>
                                <td>Consulter</td>
                                <td>Nourrir</td>
                                <td>Editer</td>
                                <td>Supprimer</td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($animals as $animal): ?>
                            <tr class="text-center alianign-middle">
                                <td><?=$animal['first_name']?></td>
                                <td><a class="" href="<?=BASE_URL?>/animal?species=<?=$animal['species_id'];?>"><?=$animal['speciesName']?></a></td>
                                <td><a class="btn btn-info" href="<?=BASE_URL?>/animal?species=<?=$animal['species_id'];?>"><i class="bi bi-eye-fill"></i></a></td>
                                <td><a class="btn btn-arc-dark" href="<?=BASE_URL?>/feeding?id=<?=$animal['animalId'];?>"><i class="fa-solid fa-carrot"></i></a></td>
                                <!-- edit -->
                                <td><a class="btn btn-warning" href="<?=BASE_URL?>/editanimal?id=<?=$animal['animalId'];?>"><i class="bi bi-pencil"></i></a></td>
                                <td> <!-- delete -->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?=$animal['animalId'];?>">
                                        <i class="bi bi-person-dash"></i>
                                    </button>
                                    <!-- modal config : warning message before animal is deleted -->
                                    <div class="modal fade" id="deleteModal<?=$animal['animalId'];?>" tabindex="-1" aria-labelledby="deleteModal<?=$animal['animalId'];?>" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header  bg-arc-mint-green">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Supprimer l'animal ?</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Voulez-vous vraiment supprimer l'animal "<?= $animal['first_name']; ?>" ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-arc-dark" data-bs-dismiss="modal">Annuler</button>
                                                <a type="button" class="btn btn-danger" href="<?=BASE_URL?>/deleteanimal?id=<?=$animal['animalId'];?>">Supprimer</a>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end modal -->
                                </td>
                            </tr>
                        <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

</div>

<script>
  // JavaScript to filter data based on search input
  document.getElementById("searchSpeciesBar").addEventListener("input", function() {
    var searchValue = this.value.toLowerCase();
    var rows = document.querySelectorAll("#speciesTable tbody tr");
    
    rows.forEach(function(row) {
      var species = row.querySelector("td:nth-child(1)").textContent.toLowerCase();
      
      if (species.includes(searchValue)) {
        row.style.display = "";
      } else {
        row.style.display = "none";
      }
    });
  });

  document.getElementById("searchAnimalsBar").addEventListener("input", function() {
    var searchValue = this.value.toLowerCase();
    var rows = document.querySelectorAll("#animalTable tbody tr");
    
    rows.forEach(function(row) {
      var firstname = row.querySelector("td:nth-child(1)").textContent.toLowerCase();
      var species = row.querySelector("td:nth-child(2)").textContent.toLowerCase();
      
      if (firstname.includes(searchValue) || species.includes(searchValue)) {
        row.style.display = "";
      } else {
        row.style.display = "none";
      }
    });
  });

  // collapse
    var collapseSpecies = new bootstrap.Collapse(document.getElementById('collapseSpecies'), {
        toggle: false
    });

    var collapseAnimals = new bootstrap.Collapse(document.getElementById('collapseAnimals'), {
        toggle: false
    });

    document.querySelectorAll('.btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
            var targetCollapseId = btn.getAttribute('href');
            var targetCollapse = new bootstrap.Collapse(document.querySelector(targetCollapseId));
            
            // Hide other collapses
            if (targetCollapseId === '#collapseSpecies') {
                collapseAnimals.hide();
            } else {
                collapseSpecies.hide();
            }
            
            // Toggle the target collapse
            targetCollapse.toggle();
        });
    });

</script>

<?php require_once "./templates/footer.php"; ?>
