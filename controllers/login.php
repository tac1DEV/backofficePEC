<?php

require './models/loginModel.php';


if (isset($_POST['submit'])) { // Vérifier si le formulaire a été soumis
    if (empty($_POST['email']) || empty($_POST['password'])) {
        $errors[] = "Veuillez remplir tous les champs.";
    } else {
        $email = htmlspecialchars(trim($_POST['email']));
        $password = htmlspecialchars(trim($_POST['password']));

        $login = new Login();
        $login->setEmail($email);
        $login->setPassword($password);

        if ($login->isRegistered()) {
            $role = $login->getRole();
            if ($role === 'admin') {
                $_SESSION['admin'] = $email;
                header('Location: index.php?page=dashboard');
                exit();
            } else {
                $_SESSION['user'] = $email;
                header('Location: index.php?page=service');
                exit();
            }
        } else {
            $errors[] = "Identifiants incorrects.";
        }
    }
}

?>
<div class="h-8 flex flex-col flex-center">
<div class="flex flex-col flex-center mb-8">
<?php
if (!empty($errors)) {
    echo "<div class='errors'>";
    foreach ($errors as $error) {
        echo "<p class='text-red'>$error</p>";
    }
    echo "</div>";
}
?>
<h1 class="text-l-brown">Connexion</h1>
<p class="text-grey">Entrez votre Email et mot de passe</p>
</div>
<form method="POST" class="flex flex-center form">
    <label for="email" class="input-label">email</label>
    <input type="email" id="email" name="email" class="input" placeholder="exemple@mail.com">
    <label for="password" class="input-label">mot de passe</label>
    <input type="password" id="password" name="password" class="input" placeholder="*****">		
    <button type="submit" class="button" id="btn" name="submit">Se connecter</button>
</form>
</div>
