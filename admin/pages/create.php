<h2>Poster un article</h2>

<?php

    if(isset($_POST['post'])){
        $title = htmlspecialchars(trim($_POST['title']));
        $content = htmlspecialchars(trim($_POST['content']));
        $posted = isset($_POST['submit']) ? "1" : "0";
        
        $errors = [];

        if(empty($title || empty($content))){
            $errors['empty'] = "Veuillez remplir tous les champs";
        }

        if(!empty($_FILES['image']['name'])){
            $file = $_FILES['image']['name'];
            $extensions = ['.png', '.jpg', '.jpeg', '.gif', '.PNG', '.JPG', '.JPEG', '.GIF'];
            $extension = strrchr($file, '.');
            
            if(!in_array($extension, $extensions)){
                $errors['image'] = "Le fichier n'est pas au bon format";
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
            post($title, $content, $posted);
        }
    }

?>

<form method="post" enctype="multipart/form-data" class="flex form" >
    <label for="title">Titre</label>
    <input type="text" name="title" id="title" class="input">
    <label for="content">Contenu</label>
    <textarea name="content" id="content" class="input"></textarea>
    <label for="image">Image de l'article</label>
    <input type="file" name="image" class="input">
    <div class="flex flex-center flex-gap-2">
    <div>
    <label for="public">Public ?</label>
    </div>
    <div class="flex flex-gap-2">
    <p>Oui</p>
    <input type="checkbox" name="public" id="public">
    </div>    
</div>
    <button type="submit" name="post">Poster</button>
</form>