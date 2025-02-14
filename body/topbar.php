<nav>
    <a href="index.php?page=home">Blog 2.0</a>
    <ul>
    <li><a href="index.php?page=home">Accueil</a></li>
    <li><a href="index.php?page=blog">Liste des articles</a></li>
    <li><a href="admin/index.php?page=dashboard">Admin</a></li>
    <?php if (isset($_SESSION['user_prenom'])): ?>
        <li><a href="index.php?page=profil">Profil</a></li>
        <li><a href="index.php?page=logout">Déconnexion</a></li>
        </ul>
        <p>Connecté en tant que <?php echo $_SESSION['user_prenom']; ?></p>
        <?php else: ?>
            <li><a href="index.php?page=login">Connexion</a></li>
        </ul>
        <?php endif; ?>
    </ul>
</nav>