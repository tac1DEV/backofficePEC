<?php

require './models/serviceModel.php';

$serviceModel = new Service();
$services = $serviceModel->getAllServices();

?>
<h1>Service</h1>
<?php foreach ($services as $service): ?>
    <a href="index.php?page=technicien&service=<?php echo urlencode($service['id']); ?>" class="flex flex-col flex-gap-4"> <!-- technicien + tri selon service -->
            <div>
                <img src="./img/<?php echo htmlspecialchars($service['image_path']); ?>" alt="<?php echo htmlspecialchars($service['nom_service']); ?>" style="width: 100%">
                <h2><?php echo htmlspecialchars($service['nom_service']); ?></h2>
                <h2><?php echo htmlspecialchars($service['prix']); ?>€</h2>
            </div>
        </a>
    <?php endforeach; ?>