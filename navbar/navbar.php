
<nav class="navbar">
    <div class="flex-space-between">
    <a href="index.php?page=<?php echo isset($_SESSION['admin']) ? 'dashboard' : 'service'; ?>" class="navbar-brand">Doc2Wheels <?php echo isset($_SESSION['admin']) ? 'admin' : ''; ?></a>
    <ul class="navbar-menu">
        <?php if (isset($_SESSION['admin'])): ?>
            <li><a href="index.php?page=dashboard">Accueil</a></li>
            <li><a href="index.php?page=create">Create</a></li>
            <li><a href="index.php?page=getAll">GetAll</a></li>
            <li><a href="index.php?page=blog">Blog</a></li>
            <li><a href="index.php?page=logout">Déconnexion</a></li>
        <?php else: ?>
            <li><a href="index.php?page=register">S'inscrire</a></li>
            <?php if (!isset($_SESSION['user'])): ?>
                <li><a href="index.php?page=login">Se connecter</a></li>
            <?php else: ?>
                <li><a href="index.php?page=logout">Se déconnecter</a></li>
            <?php endif; ?>
        <?php endif; ?>
    </ul>
    </div>
</nav>