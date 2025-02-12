<h1>Page d'accueil</h1>

<?php

$posts = get_posts();

foreach($posts as $post){
?>
    <div class="services">
					<a href="index.php?page=post&id=<?= $post->id ?>" class="flex flex-col flex-gap-4">
						<div>
							<img src="./img/posts/<?= $post->image ?>" alt="<?= $post->title ?>" style="width: 100%">
                            <h2 class="text-l-brown"><?= $post->title ?></h2>
                            <small>Le <?= date("d/m/Y à H:i",strtotime($post->date));?> par <?= $post->name ?></small>
						</div>
					</a>
    </div>
    <?php
}
?>