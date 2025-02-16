<h4>Se connecter</h4>

<?php 

if(isset($_POST['submit'])){
    $lastname = htmlspecialchars(trim($_POST['lastname']));
    $firstname = htmlspecialchars(trim($_POST['firstname']));
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));

    $errors = [];
    
    if(empty($lastname) || empty($firstname) || empty($email) || empty($password)){ // Vérifie si les champs sont vides
        $errors[] = "Tous les champs n'ont pas été remplis";
    } else {
        $result = register($lastname, $firstname, $email, $password);
        if ($result === true) {
            echo "<p>Utilisateur créé avec succès.</p>";
        } else {
            $errors[] = "Erreur lors de la création de l'utilisateur : " . $result;
        }
    }

    if(!empty($errors)){
        foreach($errors as $error){
            echo "<p>$error</p>";
        }
    }
}
?>

<form method="post" class="flex flex-col">
    <label for="lastname">Nom </label>
    <input type="text" id="lastname" name="lastname" placeholder="Nom" />
    <label for="firstname">Prénom</label>
    <input type="text" id="firstname" name="firstname" placeholder="Prénom" />
    <label for="email">Adresse email</label>
    <input type="email" id="email" name="email" placeholder="Email" />
    <label for="email">Mot de passe</label>
    <input type="password" id="password" name="password" placeholder="Mot de passe" />
    <input type="submit" name="submit" value="Se connecter" />
</form>