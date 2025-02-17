<?php

require '../config/config.php'; 
require '../models/loginModel.php';

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));
$login = new Login($db);
$login->setEmail($_POST['email']);
$login->setPassword($_POST['password']);

if ($login->isRegistered()) {
        $role = $login->getRole();
    if ($role === 'admin') {
        $_SESSION['admin'] = $email;
        header('Location: dashboard.php');
    } else {
        $_SESSION['user'] = $email;
        header('Location: index.php?page=blog');
    }    
} else {
    echo "Identifiants incorrects.";
}
} else {
echo "Veuillez remplir tous les champs.";
}

?>
<h4>Se connecter</h4>
<form method="POST" class="flex flex-col">
<label for="email">Adresse email</label>
    <input type="email" id="email" name="email" placeholder="Email" />
    <label for="password">Mot de passe</label>
    <input type="password" id="password" name="password" placeholder="Mot de passe" />
    <input type="submit" name="submit" value="Se connecter" />
</form>
