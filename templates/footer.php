<?php $timeConfig = include('./lib/timeconfig.php'); ?>

</main>
<footer id="footer">
        <div class="bg-arc-dark px-3 pt-2 arc-footer">
            <div class="row d-none d-md-flex">
                <div class="col-md-4">
                    <p class="text-light arcadia-font">Zoo d'Arcadia<br>
                    <i class="fa-solid fa-phone"></i>
                    (+33) 03 20 12 12 15</p>
                </div>
                <div class="col-md-4 d-flex align-items-center justify-content-center">
                    <a href="#" class="text-light">Mentions légales</a>
                </div>
                <div class="col-md-4 d-flex align-items-end justify-content-end text-end fst-italic">
                    <p class="text-light fs-6">
                    <i class="fa-regular fa-clock"></i>
                        <?= $timeConfig['opening_hours']['time1']; ?><br/>
                        <?= $timeConfig['opening_hours']['time2']; ?></p>
                </div>
            </div>
            <div class="d-sm-flex d-md-none p-2 d-flex align-items-center justify-content-center">
                <!-- trigger Phone modal on small screens -->
                <button type="button" class="btn btn-arc-dark" data-bs-toggle="modal" data-bs-target="#phoneModal">
                <i class="fa-solid fa-phone"></i>
                </button>

                <!-- Phone modal on small screens -->
                <div class="modal fade" id="phoneModal" tabindex="-1" aria-labelledby="phoneModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="phoneModal"><i class="fa-solid fa-phone"></i> Téléphone</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    (+33) 03 20 12 12 15
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-arc-dark" data-bs-dismiss="modal">Fermer</button>
                    </div>
                    </div>
                </div>
                </div>
                <!-- end phone modal -->

                <a href="#" class="text-light btn btn-arc-dark">Mentions légales</a>
               
                <!-- trigger OpeningTimes modal on small screens -->
                <button type="button" class="btn btn-arc-dark" data-bs-toggle="modal" data-bs-target="#openingTimesModal">
                    <i class="fa-regular fa-clock"></i>
                </button>

                <!-- OpeningTimes modal on small screens -->
                <div class="modal fade" id="openingTimesModal" tabindex="-1" aria-labelledby="openingTimesModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="openingTimesModal"><i class="fa-regular fa-clock"></i> Horaires d'ouverture</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="fs-6">
                            <?= $timeConfig['opening_hours']['time1']; ?><br/>
                            <?= $timeConfig['opening_hours']['time2']; ?>
                        </p>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-arc-dark" data-bs-dismiss="modal">Fermer</button>
                    </div>
                    </div>
                </div>
                </div>
                <!-- end OpeningTimes modal -->
 
            </div>  
        </div>
</footer>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>

</body>
</html>