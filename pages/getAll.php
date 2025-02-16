<h2>Tous les articles</h2>
<hr style="width:100%"/>
<?php
    $posts = get_posts();
    foreach($posts as $post){
        ?>
        <div class="flex flex-col">
            <h3><?= $post->title ?><?php echo ($post->posted == "0") ? " (Non-visible)" : "" ?></h3>

            <p><?= substr(nl2br($post->content),0,1200) ?></p>
            <img src="img/posts/<?= $post->image ?>" alt="<?= $post->title ?>" />
            <br/><br/>
            <a href="index.php?page=getById&id=<?= $post->id ?>">Voir l'article</a>
        </div>
        <?php
    }