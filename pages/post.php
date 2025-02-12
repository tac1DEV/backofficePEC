<?php

$post = get_posts();
if($post == false){
    header("Location: index.php?page=error");
}else{
    ?>
    <div class="container">
    <img src="img/posts/<?= $post->image ?>" alt="<?= $post->title ?>" />
    <h2><?= $post->title ?></h2>
    <h3><?= $post->name ?> le <?= date("d/m/Y à H:i",strtotime($post->date));?> </h3>
    <p><?= nl2br($post->content) ?></p>
    </div>
    <?php
}
?>

<hr />
<h4>Commentaires: </h4>
<?php
    if(isset($_POST['submit'])){
        $name = htmlspecialchars(trim($_POST['name']));
        $email = htmlspecialchars(trim($_POST['email']));
        $comment = htmlspecialchars(trim($_POST['comment']));
        $errors = [];
        
        if(empty($name) || empty($email) || empty($comment)){
            $errors['empty'] = "Tous les champs n'ont pas été remplis";
        }else{
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errors['email'] = "L'adresse email n'est pas valide";
            }
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
            comment($name, $email, $comment);
            ?>
            <script>
                window.location.replace("index.php?page=post&id=<?= $_GET['id'] ?>");
            </script>
            <?php
        }
    }
?>

<form method="post" class="flex flex-col">
    <label for="name">Nom: </label>
    <input type="text" name="name" id="name" />
    <label for="comment">Email: </label>
    <input type="text" name="email" id="email" />
    <label for="comment">Commentaire: </label>
    <textarea name="comment" id="comment"></textarea>
    <input type="submit" name="submit" value="Envoyer" />
</form>