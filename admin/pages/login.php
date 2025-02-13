
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
        
        if(empty($email) || empty($password)){
            $errors['empty'] = "Tous les champs n'ont pas été remplis";
        }else if(is_admin($email, $password)==0){
            $errors['exist'] = "Mail ou mot de passe incorrect";
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
            $_SESSION['admin'] = $email;
            header("Location: index.php?page=dashboard");
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