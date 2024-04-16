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
                        <?= $openingTimes[0]; ?><br/>
                        <?= $openingTimes[1]; ?></p>
                </div>
            </div>
            <div class="d-sm-flex d-md-none p-2 d-flex align-items-center justify-content-center">
                <p class="d-inline-flex gap-1">
                    <a class="btn btn-arc-dark" role="button" href="#collapsePhone" data-bs-toggle="collapse" aria-expanded="false" aria-controls="collapsePhone">
                    <i class="fa-solid fa-phone"></i>
                    </a>
                    <a href="#" class="text-light btn btn-arc-dark">Mentions légales</a>
                    <a class="btn btn-arc-dark" role="button" href="#collapseSchedule" data-bs-toggle="collapse" aria-expanded="false" aria-controls="collapseSchedule">
                        <i class="fa-regular fa-clock"></i>
                    </a>
                    <div class="collapse" id="collaspsePhone">
                        <div class="card card-body">
                            (+33) 03 20 12 12 15
                        </div>
                    </div>
                </p>
            </div>  
        </div>
</footer>
</main>

    <script type="module" src="Router/router.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>

</body>
</html>