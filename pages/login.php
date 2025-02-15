
<?php

if(isset($_SESSION['admin'])){
    header('Location: index.php?page=dashboard');
}

?>

<h4>Se connecter</h4>

<?php 

    if(isset($_POST['submit'])){
        $email = htmlspecialchars(trim($_POST['email']));
        $password = htmlspecialchars(trim($_POST['password']));

        $errors = [];
        
        if(empty($email) || empty($password)){//verifie si les champs sont vides
            $errors['empty'] = "Tous les champs n'ont pas été remplis";
        }else if(is_admin($email, $password)){//verifie si l'utilisateur est un admin
            $_SESSION['admin'] = $email;
            header("Location: index.php?page=dashboard");
        }else if(is_user($email, $password)){//verifie si l'utilisateur est un user{
            $_SESSION['user'] = $email;
            header("Location: index.php?page=blog");
        }
        if(!empty($errors)){
            ?>
            <p>
                <?php
                foreach($errors as $error){
                    echo $error . "<br />";
                }
                ?>
            <?php
        }else{
            ?>
            <p>Identifiants incorrects</p>
            <?php
        }
    }
?>

<form method="post" class="flex flex-col">
<label for="email">Adresse email</label>
    <input type="email" id="email" name="email" placeholder="Email" />
    <label for="email">Mot de passe</label>
    <input type="password" id="password" name="password" placeholder="Mot de passe" />
    <input type="submit" name="submit" value="Se connecter" />
</form>