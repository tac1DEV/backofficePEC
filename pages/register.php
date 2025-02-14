<?php
  
  if(isset($_POST['post'])){
    $lastname = htmlspecialchars(trim($_POST['lastname']));
    $firstname = htmlspecialchars(trim($_POST['firstname']));
    $password = htmlspecialchars(trim($_POST['password']));
    $email = htmlspecialchars(trim($_POST['email']));

    $errors = [];

    if(create_user($lastname, $firstname, $email, $password)==false){
        $errors['exist'] = "Ce mail est déjà utilisé.";
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
        <p>Utilisateur créé avec succès.</p>
        <?php
    }
}
?>
<h2>Créer un utilisateur</h2>
    <form method="post">
        <div>
            <label for="lastname">Nom :</label>
            <input type="text" id="lastname" name="lastname" required>
        </div>
        <div>
            <label for="firstname">Prénom :</label>
            <input type="text" id="firstname" name="firstname" required>
        </div>
        <div>
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <button type="submit" name="post">Créer l'utilisateur</button>
        </div>
    </form>
    <div class="flex flex-center redirectCo">
        <p>Déjà inscrit ? Connectez vous</p>
		<a href="index.php?page=login">ici</a>
	</div>