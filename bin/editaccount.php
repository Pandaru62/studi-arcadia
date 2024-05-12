<?php 
require_once "./templates/header.php";
?>

<div class="container mb-4 py-3">

    <section id="editMember">

        <div class="row bg-arc-mint-green py-3 my-5">
            <h2>Editer le compte d'un membre</h2>
            
            <div class="row g-0 px-5">
                <div class="table-responsive">
                    <table class="table table-success table-striped">
                        <thead class="table-dark fw-bold">
                            <tr class=" text-center">
                                <td>Éditer</td>
                                <td>Nom</td>
                                <td>Prénom</td>
                                <td>Email</td>
                                <td>Mot de passe</td>
                                <td>Rôle</td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($userList as $user):?>
                            <tr class=" text-center">
                                <td><a href="<?=BASE_URL?>/editaccount?id=<?=$user['userId'];?>"><i class="bi bi-pencil"></i></a></td>
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
