<?php 

include '../functions/main-functions.php';

    $pages = scandir('pages');
    if(isset($_GET['page']) && !empty($_GET['page'])){
        if(in_array($_GET['page'].'.php', $pages)){
            $page = $_GET['page'];
        }else{
        $page = 'error';
        }
    }else{
        $page = 'dashboard';
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
    <link rel="stylesheet" href="../css/main.css">
    <title>Administration</title>
</head>
<body>
<?php 

if($page != 'login' && !isset($_SESSION['admin'])){
    header('Location: index.php?page=login');
}

include 'body/topbar.php'; ?>
<div class="container flex-col flex flex-center">
<?php include 'pages/'.$page.'.php'; ?>
</div>
</body>
</html>