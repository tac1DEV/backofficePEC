<?php
    $post = get_post();
    if($post === false){
        header('Location: index.php?page=error');
    }
?>
<h2><?= $post->title ?></h2>
<hr style="width:100%"/>
<img src="../img/posts/<?= $post->image ?>" alt="<?= $post->title ?>" />
        <div class="flex flex-col">

        <?php 
        
        if(isset($_POST['post'])){
            $title = htmlspecialchars(trim($_POST['title']));
            $content = htmlspecialchars(trim($_POST['content']));
            $posted = isset($_POST['public']) ? "1" : "0";
            
            $errors = [];
    
            if(empty($title || empty($content))){
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
                edit($title, $content, $posted, $_GET['id']);
                ?>
                <script>
                    window.location.replace("index.php?page=getById&id=<?= $_GET['id'] ?>");
                </script>
                <?php
            }
        }
        if(isset($_POST['delete'])){
            delete($_GET['id']);
            ?>
            <script>
                window.location.replace("index.php?page=getAll");
            </script>
            <?php
        }

        ?>

            <form method="post" class="flex flex-col">
                <label for="title">Titre de l'article</label>
            <input type="text" name="title" id="title" value="<?= $post->title ?>" />
                <label for="content">Contenu de l'article</label>
            <textarea id="content" name="content"><?= $post->content ?></textarea>
            <div class="flex flex-center flex-gap-2">
            <div>
            <label for="public">Public ?</label>
            </div>
            <div class="flex flex-gap-2">
            <p>Oui</p>
            <input type="checkbox" name="public" id="public" <?php echo($post->posted == 1) ? 'checked' : ''; ?> />
            </div>    
        </div>
            <button type="submit" name="post">Modifier l'article</button>
        </form>
        <form method="post" class="flex flex-col mt-4">
            <button type="submit" name="delete">Supprimer l'article</button>
        </div>
        <?php
    