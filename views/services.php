<?php $title = "Zoo d'Arcadia";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// ob_start();

$user = 'employee';

require_once('./templates/header.php');
require_once('./models/service.php');
require_once('./lib/config.php');
require_once('./lib/pdo.php');


?>

        <div class="container my-md-4 py-3">
            <section id="main_services">
                

                <div class="row">
                    <div class="col rect-upper-effect"></div>
                </div>
                <div class="row text-center pt-md-3 bg-arc-dark text-light">
                    <div class="col-md-8">
                        <h1 class="text-light text-center pb-2">Nos services pour vous satisfaire</h1>
                        <p class="py-3">Au zoo d'Arcadia, le bien-être de nos animaux importe autant que celui de nos visiteurs<br>
                        Différents services vous sont proposés dans le parc afin de rendre votre journée inoubliable.</p>
                        <h2 class="light-h3 text-center pb-2">Horaires</h2>
                        <p class="py-3">
                        <i class="fa-regular fa-clock"></i>
                        <?= $openingTimes[0]; ?><br/>
                        <?= $openingTimes[1]; ?></p>
                    </div>
                    <div class="offset-md-1 col-md-3">
                        <img src="assets/leaf.svg" class="img-fluid d-none d-md-block" style="opacity: 70%; height: 80%">
                    </div>
                </div>
                <div class="row bg-arc-dark">
                    <div class="col rect-lower-effect"></div>
                </div>


            </section>
            <section id="services_list">


            
            <?php 
            $services = getServices($pdo);
            $lastId = getLastServiceId($pdo); 
            foreach($services as $key => $service): ?>

                <div class="row bg-arc-mint-green pt-3">
                    <div class="col-md-4 d-flex justify-content-center text-align-center">
                        <img src="./uploads/services/<?=$service['image']?>" alt="<?=$service['name']?>" class="service-img">
                    </div>
                    <?php if($user == "employee" || $user == "admin"):?>
                        <div class="col-md-1 d-flex flex-col flex-column justify-content-center">
                            <a href="edit_service.php?myid=<?=$service['id'];?>" class="btn btn-warning my-2"><i class="fa-regular fa-pen-to-square"></i> éditer</a>
                            <?php if($user == "admin"):?>
                            <a href="#" class="btn btn-danger mb-2"><i class="fa-solid fa-trash"></i> suppr.</a>
                            <?php endif ?>
                        </div>
                        <div class="col-md-7">
                    <?php else:?>
                        <div class="offset-md-1 col-md-7">
                    <?php endif ?>
                        <h2><?= $service['name'];?></h2>
                        <?php if($service['isFree'] == 1):?>
                            <div class="pb-2">
                                <span class="text-light fw-bold bg-arc-dark py-1 px-2 mb-3 rounded-3"><i class="fa-regular fa-face-smile"></i> SERVICE GRATUIT</span>
                            </div>
                                <?php endif?>
                        <p><?= $service['description']; ?></p>
                    </div>
                    <div class="py-4"><?php if($service['id'] !== $lastId[0]) {echo "<hr>";} ?></div>
                </div>
                    
            <?php endforeach ;?>
                                
            <?php if($user == "employee" || $user = "admin"):?>
            
            <div class="row bg-arc-mint-green p-3">
                <div class="py-3 my-3 d-flex align-items-center justify-content-center">
                    <a class="btn btn-arc-dark rounded-5 btn-lg" href="add_service.php">
                        <i class="bi bi-plus-circle-fill"></i> 
                        Ajouter un nouveau service
                    </a>
                </div>
            </div>
                
            <?php endif ; ?>

                <div class="row bg-arc-mint-green pt-3">
                    <div class="col rect-bottom-effect"></div>
                </div>

            </section>

        </div>

<?php 
require_once('./templates/footer.php')
 ?>