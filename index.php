<?php
require 'autoload.php'; // Connexion a la db
session_start();

$page = isset($_GET['page']) ? $_GET['page'] : 'service'; //Service par defaut (comme sur figma) 

$pageFile = 'controllers/' . $page . '.php'; //Tous les controleurs

if (!file_exists($pageFile)) {
    $pageFile = 'controllers/error.php';
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>Document</title>
</head>
<body>
<?php 
include './navbar/navbar.php'; 
?>
<div class="container">
    <?php include $pageFile; ?>
</div>
</body>
</html>