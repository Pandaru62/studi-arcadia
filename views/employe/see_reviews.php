<?php

require_once "./templates/header.php"; ?>

<div class="container mb-4 py-3">

    <section id="seereviews">

        <div class="row bg-arc-mint-green py-3 mb-5">
            <div class="col">
                <h2>Les avis de nos visiteurs</h2>

<div class="row g-0 px-5">
    <div class="table-responsive">
        <table class="table table-success table-striped">
            <thead class="table-dark fw-bold">
                <tr class=" text-center">
                    <td>Pseudo</td>
                    <td>Message</td>
                    <td>Valider</td>
                    <td>Supprimer</td>
                </tr>
            </thead>
            <tbody>
            <?php foreach($allReviews as $id => $review) {?>
                <tr class="text-center align-middle">
                    <td><?=$review['pseudo']?></td>
                    <td><?=$review['message']?></td>
                    <td><?php if($review['isChecked'] === 1) {?>
                    <button class="btn btn-arc-dark" href="#" disabled><i class="bi bi-check-circle-fill"></i></button>
                    <?php } else { ?>
                    <a class="btn btn-arc-dark" href="<?= BASE_URL ?>/validatereview?id=<?= $review['id'];?>"><i class="bi bi-check-circle-fill"></i></a>
                        <?php } ?>
                    </td>
                    <td>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteReviewModal<?=$review['id'];?>">
                            <i class="bi bi-person-dash"></i>
                        </button>
                        <!-- modal config : warning message before review deleted -->
                        <div class="modal fade" id="deleteReviewModal<?=$review['id'];?>" tabindex="-1" aria-labelledby="deleteReviewModal<?=$review['id'];?>" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header  bg-arc-mint-green">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Supprimer l'avis ?</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Voulez-vous vraiment supprimer cet avis ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-arc-dark" data-bs-dismiss="modal">Annuler</button>
                                    <a type="button" class="btn btn-danger" href="<?=BASE_URL?>/deletereview?id=<?=$review['id'];?>">Supprimer</a>
                                </div>
                                </div>
                            </div>
                        </div>
                        <!-- end modal -->
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>

            </div>
    </section>
</div>


<?php require_once "./templates/footer.php"; ?>
