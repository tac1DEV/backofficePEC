

<?php

require './models/technicienModel.php';

$service = isset($_GET['service']) ? htmlspecialchars($_GET['service']) : '';

$technicienModel = new Technicien();
$techniciens = $technicienModel->getTechniciensByService($service);
$service_name = $technicienModel->getServiceData($service, "nom_service");
$service_prix = $technicienModel->getServiceData($service, "prix");


?>
<?php 
if (!empty($service)): 
?>
    <h2>Service <?php echo htmlspecialchars($service_name); ?> :</h2>

<?php endif; ?>
<?php foreach ($techniciens as $technicien): ?>
    <div class="my-3 flex flex-center">

        <div class="grid grid-cols-12 max-w-5 p-4 bg-l-grey">
						<div class="flex flex-center col-5">
							<img src="./img/<?php echo htmlspecialchars($technicien['image_path']); ?>" alt="photoProfil" style="width: 100%">
						</div>
						<div class="col-7">
							<h2><?php echo htmlspecialchars($technicien['prenom']); ?> <?php echo htmlspecialchars($technicien['nom']); ?> - <?php echo htmlspecialchars($service_name); ?></h2>
                            <p>Email: <?php echo htmlspecialchars($technicien['email']); ?></p>
                            <p>Numéro: <?php echo htmlspecialchars($technicien['numero']); ?></p>
							<p>
                            <?php echo htmlspecialchars($service_prix); ?>€
							</p>
							<span class="star checked" data-star="1"></span>
							<span class="star" data-star="2"></span>
							<span class="star" data-star="3"></span>
							<span class="star" data-star="4"></span>
							<span class="star" data-star="5"></span>
						</div>
					</div>
    </div>
<?php endforeach; ?>
