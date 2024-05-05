<?php require_once "./templates/header.php"; ?>

<div class="container mb-4 py-3">
    <section id="animalList">
        <div class="row bg-arc-mint-green pt-3 mt-1">
            <ul class="nav nav-tabs mt-3">
                <li class="nav-item">
                    <a class="nav-link <?= ($filter == "species") ? "active" : ""; ?>" aria-current="page" href="<?= BASE_URL.'/seeanimals?filter=species'; ?>">Voir les espèces</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($filter == "animalalpha") ? "active" : ""; ?>" href="<?= BASE_URL.'/seeanimals?filter=animalalpha'; ?>">Tous les animaux</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($filter == "animalbyspecies") ? "active" : ""; ?>" href="<?= BASE_URL.'/seeanimals?filter=animalbyspecies'; ?>">Animaux par espèce</a>
                </li>
            </ul>

            <?php if ($filter == "animalalpha" || $filter == "animalbyspecies"): ?>

            <h2>Voir les animaux</h2>

            <div class="col-md-6">
                <form method="POST" enctype="multipart/form-data" action="./views/employe/searchAnimalProcess.php">
                        <div class="mb-3">
                            <label for="animalSpec" class="form-label">Quelle espèce d'animal recherchez-vous ?</label>
                            <select class="form-select mb-3" aria-label="Select species" id="animalSpec" name="animalSpec">
                                <?php foreach($species as $specie): ?>
                                <option value="<?=$specie['id']?>"  <?php if(isset($_GET['id']) && $_GET['id'] == $specie['id']){echo " selected = selected";}?>><?=$specie['name']?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-arc-dark" name="searchAnimalForm" type="submit">Rechercher</button>
                        </div>
                </form>
            </div>

            <div class="table-responsive">
                <table class="table table-success table-striped align-middle" id="animalNameTable">
                    <thead class="table-dark fw-bold">
                        <tr class="text-center">
                            <td>Nom de l'animal</td>
                            <td>Espèce</td>
                            <td>Consulter</td>
                            <td>Nourrir</td>
                            <?php if ($_SESSION['userRole'] == 'admin'): ?>
                            <td>Editer</td>
                            <td>Supprimer</td>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($animals as $animal): ?>
                        <tr class="text-center align-middle">
                            <td><?= $animal['first_name'] ?></td>
                            <td><a href="<?= BASE_URL ?>/animal?species=<?= $animal['species_id'] ?>"><?= $animal['speciesName'] ?></a></td>
                            <td><a class="btn btn-info" href="<?= BASE_URL ?>/show?animal=<?= $animal['animalId'] ?>"><i class="bi bi-eye-fill"></i></a></td>
                            <td><a class="btn btn-arc-dark" href="<?= BASE_URL ?>/feeding?id=<?= $animal['animalId'] ?>"><i class="fa-solid fa-carrot"></i></a></td>
                            <?php if ($_SESSION['userRole'] == 'admin'): ?>
                            <td><a class="btn btn-warning" href="<?= BASE_URL ?>/editanimal?id=<?= $animal['animalId'] ?>"><i class="bi bi-pencil"></i></a></td>
                            <td>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $animal['animalId'] ?>"><i class="bi bi-person-dash"></i></button>
                                <div class="modal fade" id="deleteModal<?= $animal['animalId'] ?>" tabindex="-1" aria-labelledby="deleteModal<?= $animal['animalId'] ?>" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-arc-mint-green">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Supprimer l'animal ?</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Voulez-vous vraiment supprimer l'animal "<?= $animal['first_name'] ?>" ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-arc-dark" data-bs-dismiss="modal">Annuler</button>
                                                <a type="button" class="btn btn-danger" href="<?= BASE_URL ?>/deleteanimal?id=<?= $animal['animalId'] ?>">Supprimer</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <?php endif; ?>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>

            <?php else: ?>

            <h2>Rechercher une espèce</h2>

            <div class="col-md-6">
                <div class="mb-3">
                    <label for="searchSpeciesBar" class="form-label">Chercher une espèce</label>
                    <input type="text" id="searchSpeciesBar" class="form-control" placeholder="Entrez le nom d'une espèce">
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-success table-striped align-middle" id="speciesTable">
                    <thead class="table-dark fw-bold">
                        <tr class="text-center">
                            <td>Nom de l'espèce</td>
                            <td>Nombre d'animaux</td>
                            <td>Consulter</td>
                            <td>Editer</td>
                            <td>Supprimer</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($species as $specie): ?>
                        <tr class="text-center">
                            <td><?= $specie['name'] ?></td>
                            <td>x<?= $specie['animal_count'] ?></td>
                            <td><a class="btn btn-info" href="<?= BASE_URL ?>/animal?species=<?= $specie['id'] ?>"><i class="bi bi-eye-fill"></i> Voir la page</a></td>
                            <td><a class="btn btn-warning" href="<?= BASE_URL ?>/editspecie?id=<?= $specie['id'] ?>"><i class="bi bi-pencil"></i> Editer</a></td>
                            <td>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteSpModal<?= $specie['id'] ?>"><i class="bi bi-person-dash"></i> Supprimer</button>
                                <div class="modal fade" id="deleteSpModal<?= $specie['id'] ?>" tabindex="-1" aria-labelledby="deleteSpModal<?= $specie['id'] ?>" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-arc-mint-green">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Supprimer l'espèce ?</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Voulez-vous vraiment supprimer l'espèce "<?= $specie['name'] ?>" ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-arc-dark" data-bs-dismiss="modal">Annuler</button>
                                                <a type="button" class="btn btn-danger" href="<?= BASE_URL ?>/deletespecies?id=<?= $specie['id'] ?>">Supprimer</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>

            <?php endif; ?>
        </div>
    </section>
</div>

<script>
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

</script>

<?php require_once "./templates/footer.php"; ?>
