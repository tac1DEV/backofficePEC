<nav>
    <a href="index.php?page=dashboard">Blog 2.0 admin</a>
    <ul>
    <li><a href="index.php?page=dashboard">Accueil</a></li>
    <li><a href="index.php?page=create">Create</a></li>
    <li><a href="index.php?page=getAll">GetAll</a></li>
    <li><a href="../index.php?page=home">Blog</a></li>
    <?php if (isset($_SESSION['admin'])): ?>
        <li><a href="index.php?page=logout">Déconnexion</a></li>
    <?php endif; ?>
    </ul>
</nav>