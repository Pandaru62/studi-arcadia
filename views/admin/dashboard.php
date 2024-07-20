<?php 
require_once "./templates/header.php";
?>

<div class="container mb-4 py-3">

    <section id="dashboardAdmin">

        <div class="row bg-arc-mint-green py-3 my-5">
            <h2>Dashboard</h2>
            <h3>Fonctionnalités</h3>
            <div class="col-6 col-md-3 mb-2">
                <div class="bg-arc-dark text-light rounded-4 py-3">
                <div class="text-center">
                    <i class="fa-solid fa-user fs-2"></i><br>
                    <span class="fw-bold fs-4">Gestion des utilisateurs</span>
                </div>
                    <hr class="border border-light border-2 opacity-75">
                    <ul class="text-left">
                        <li class="pt-2"><a class="link-light" href="<?=BASE_URL?>/showaccounts">Liste des utilisateurs</a></li>
                        <li class="pt-2"><a class="link-light " href="<?=BASE_URL?>/signup">Ajout d'un compte utilisateur</a></li>
                        <li class="pt-2"><a class="link-light" href="<?=BASE_URL?>/editaccount">Modification d'un compte</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-6 col-md-3 mb-2">
                <div class="bg-arc-dark text-light rounded-4 py-3">
                <div class="text-center">
                    <i class="fa-solid fa-bell-concierge fs-2"></i><br>
                    <span class="fw-bold fs-4">Gestion des services</span>
                </div>
                    <hr class="border border-light border-2 opacity-75">
                    <ul class="text-left">
                        <li class="pt-2"><a class="link-light" href="<?=BASE_URL?>/time">Modification des horaires</a></li>
                        <li class="pt-2"><a class="link-light " href="<?=BASE_URL?>/services">Modification d'un service</a></li>
                        <li class="pt-2"><a class="link-light" href="<?=BASE_URL?>/addservice">Ajout d'un service</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-6 col-md-3 mb-2">
                <div class="bg-arc-dark text-light rounded-4 py-3">
                <div class="text-center">
                    <i class="fa-solid fa-tree fs-2"></i><br>
                    <span class="fw-bold fs-4">Gestion des habitats</span>
                </div>
                    <hr class="border border-light border-2 opacity-75">
                    <ul class="text-left">
                        <li class="pt-2"><a class="link-light " href="<?=BASE_URL?>/habitats">Modification d'un habitat</a></li>
                        <li class="pt-2"><a class="link-light" href="<?=BASE_URL?>/addhabitat">Ajout d'un habitat</a></li>
                        <li class="pt-2"><a class="link-light" href="<?=BASE_URL?>/seeHabitatComment">Voir les commentaires d'habitat</a></li>
                        <li class="pt-2"><a class="link-light" href="<?=BASE_URL?>/commenthabitat">Ajouter un commentaire d'habitat</a></li>
                    </ul>

                </div>
                    <a href="<?=BASE_URL?>/review" class="btn btn-arc-dark mt-3 d-flex justify-content-center fw-bold align-items-center"><i class="fa-solid fa-magnifying-glass pe-2"></i> Consulter les avis des visiteurs</a>

            </div>
            <div class="col-6 col-md-3 mb-2">
                <div class="bg-arc-dark text-light rounded-4 py-3">
                <div class="text-center">
                    <i class="fa-solid fa-paw fs-2"></i><br>
                    <span class="fw-bold fs-4">Gestion des animaux</span>
                </div>
                    <hr class="border border-light border-2 opacity-75">
                    <ul class="text-left">
                        <li class="pt-2"><a class="link-light" href="<?=BASE_URL?>/seeanimals">Accès à la liste complète</a></li>
                        <li class="pt-2"><a class="link-light " href="<?=BASE_URL?>/addspecies">Ajout d'une espèce</a></li>
                        <li class="pt-2"><a class="link-light" href="<?=BASE_URL?>/addanimal">Ajout d'un animal</a></li>
                        <li class="pt-2"><a class="link-light " href="<?=BASE_URL?>/seefeeding">Accès à l'historique d'alimentation</a></li>
                        <li class="pt-2"><a class="link-light" href="<?=BASE_URL?>/seecheckup">Accès aux comptes rendus du vétérinaire</a></li>
                    </ul>
                </div>
            </div>

            <h3>Compteur de visites</h3>

            <div class="container">
                <canvas id="speciesChart" width="400" height="200"></canvas>
            </div>

            <?php
            $chartData = [];
            foreach ($speciesByCount as $key => $specie) {
                $chartData[$specie['speciesName']] = $specie['speciesCount'];
            }
            $chartData = json_encode($chartData);
            ?>

            <div class="table-responsive mt-3">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Classement</th>
                            <th>Nom de l'espèce</th>
                            <th>Nombre de visites</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($speciesByCount as $key => $specie) {?>
                            <tr>
                                <td>#<?= $key + 1 ?></td>
                                <td><?= $specie['speciesName'] ?></td>
                                <td><?= $specie['speciesCount'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>
    </section>
</div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        var speciesData = <?php echo $chartData; ?>;
        
        var speciesNames = Object.keys(speciesData);
        var speciesCounts = Object.values(speciesData);
        
        var ctx = document.getElementById('speciesChart').getContext('2d');
        
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: speciesNames,
                datasets: [{
                    label: 'Nombre de visites',
                    data: speciesCounts,
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>


    <?php require_once"./templates/footer.php" ?>
