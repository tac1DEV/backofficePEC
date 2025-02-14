<?php
    $post = get_post();
?>
<h2><?= $post->title ?></h2>
<hr style="width:100%"/>
<img src="../img/posts/<?= $post->image ?>" alt="<?= $post->title ?>" />
        <div class="flex flex-col">
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
        </div>
        <?php
    