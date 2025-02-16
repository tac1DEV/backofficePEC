<?php 
include 'functions/main-functions.php';

    $pages = scandir('pages');
    if(isset($_GET['page']) && !empty($_GET['page'])){
        if(in_array($_GET['page'].'.php', $pages)){
            $page = $_GET['page'];
        }else{
        $page = 'error';
        }
    }else{
        $page = 'blog';
    }

    $pages_functions = scandir('functions/');
    if(in_array($page.'.func.php', $pages_functions)){
        include 'functions/'.$page.'.func.php';
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
<nav class="navbar">
    <div class="flex-space-between">
    <a href="index.php?page=<?php echo isset($_SESSION['admin']) ? 'dashboard' : 'blog'; ?>" class="navbar-brand">Blog 2.0 <?php echo isset($_SESSION['admin']) ? 'admin' : ''; ?></a>
    <ul class="navbar-menu">
        <?php if (isset($_SESSION['admin'])): ?>
            <li><a href="index.php?page=dashboard">Accueil</a></li>
            <li><a href="index.php?page=create">Create</a></li>
            <li><a href="index.php?page=getAll">GetAll</a></li>
            <li><a href="index.php?page=blog">Blog</a></li>
            <li><a href="index.php?page=logout">Déconnexion</a></li>
        <?php else: ?>
            <li><a href="index.php?page=blog">Liste des articles</a></li>
            <?php if (!isset($_SESSION['user'])): ?>
                <li><a href="index.php?page=login">Se connecter</a></li>
            <?php else: ?>
                <li><a href="index.php?page=logout">Se déconnecter</a></li>
            <?php endif; ?>
        <?php endif; ?>
    </ul>
    </div>
</nav>
<div class="container">
<?php include 'pages/'.$page.'.php'; ?>
</div>
</body>
</html>