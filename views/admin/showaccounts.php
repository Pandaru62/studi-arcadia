<?php 
require_once "./templates/header.php";

?>

<div class="container mb-4 py-3">

    <section id="editMember">

        <div class="row bg-arc-mint-green py-3 my-5">
            <h2>Voir les comptes des membres</h2>
            <?php if(isset($_GET['success'])) { ?>
                <div class="d-flex">
                    <div class="alert alert-success" role="alert">
                        <i class="fa-solid fa-check"></i> <?= $sucess[$_GET['success']]; ?>
                    </div>
                </div>
            <?php } ?>
            
            <div class="row g-0 px-5">
                <div class="table-responsive">
                    <table class="table table-success table-striped">
                        <thead class="table-dark fw-bold">
                            <tr class=" text-center">
                                <td>Éditer</td>
                                <td>Supprimer</td>
                                <td>Nom</td>
                                <td>Prénom</td>
                                <td>Email</td>
                                <td>Mot de passe</td>
                                <td>Rôle</td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($userList as $user):?>
                            <tr class="text-center align-middle">
                                <td><a class="btn btn-arc-dark" href="<?=BASE_URL?>/editaccount?id=<?=$user['userId'];?>"><i class="bi bi-pencil"></i></a></td>
                                <td>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?=$user['userId'];?>">
                                        <i class="bi bi-person-dash"></i>
                                    </button>
                                    <!-- modal config : warning message before user deleted -->
                                    <div class="modal fade" id="deleteModal<?=$user['userId'];?>" tabindex="-1" aria-labelledby="deleteModal<?=$user['userId'];?>" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header  bg-arc-mint-green">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Supprimer l'utilisateur ?</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Voulez-vous vraiment supprimer l'utilisateur "<?= $user['first_name']. " " .$user['last_name']; ?>" ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-arc-dark" data-bs-dismiss="modal">Annuler</button>
                                                <a type="button" class="btn btn-danger" href="<?=BASE_URL?>/deleteaccount?id=<?=$user['userId'];?>">Supprimer</a>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end modal -->
                                </td>
                                <td><?=$user['last_name']?></td>
                                <td><?=$user['first_name']?></td>
                                <td><?=$user['email']?></td>
                                <td>******</td>
                                <td><?=$user['name']?></td>
                            </tr>
                        <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>


            

            
                
        </div>
    </section>
</div>

    <?php require_once"./templates/footer.php" ?>
