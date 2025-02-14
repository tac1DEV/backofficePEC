<?php
  
  if(isset($_POST['post'])){
    $lastname = htmlspecialchars(trim($_POST['lastname']));
    $firstname = htmlspecialchars(trim($_POST['firstname']));
    $password = htmlspecialchars(trim($_POST['password']));
    $email = htmlspecialchars(trim($_POST['email']));

    $errors = [];

    if(empty($lastname) || empty($firstname) || empty($password) || empty($email)){
        $errors['empty'] = "Veuillez remplir tous les champs";
    }

    if(!empty($errors)){
        ?>
        <p>
            <?php
            foreach($errors as $error){
                echo $error . "<br />";
            }
            ?>
        </p>
        <?php
    }else{
        create_user($lastname ,$firstname, $email, $password);
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