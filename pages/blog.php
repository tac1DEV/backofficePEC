<h2>blog</h2>
<?php

$posts = get_posts();
foreach($posts as $post){
    ?>
<h2 class="text-l-brown"><?= $post->title ?></h2>
<div class="flex flex-gap-4">
<p><?= substr(nl2br($post->content),0,1200) ?></p>
<img src="./img/posts/<?= $post->image ?>" alt="<?= $post->title ?>" style="width: 100%">
</div>
<a href="index.php?page=post&id=<?= $post->id ?>">Lire l'article complet</a>
    <?php
}

?>