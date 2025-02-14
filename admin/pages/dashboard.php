<h2>Tableau de bord</h2>
<?php 

$tables = [
    "Publications" => "posts",
    "Commentaires" => "comments",
    "Administrateurs" => "admins"
];
?>
<div class="flex flex-gap-4">
<?php   
foreach($tables as $table_name => $table){
?>

<div class="flex flex-col flex-center bg-l-brown p-4 text-white">
    <h3><?= $table ?></h3>
    <?php $nbrInTable = inTable($table); ?>
    <p><?= $nbrInTable[0]?></p>
</div>
<?php
}
?>
</div>
<h4>Commentaires non lus</h4>
<?php 
    $comments = get_comments();
?>
<table style="border: 1px solid black; text-align: initial;">
    <thead>
        <tr>
            <td style="border: 1px solid black;">Article</td>
            <td style="border: 1px solid black;">Commentaire</td>
            <td style="border: 1px solid black;">Actions</td>
        </tr>
    </thead>
    <tbody>
        <?php 
        if(!empty($comments)){
            foreach($comments as $comment){
                ?>
                <tr id="commentaire_<?= $comment->id?>">
                <td style="border: 1px solid black;"><?= $comment->title?></td>
                <td style="border: 1px solid black;"><?= substr($comment->comment,0,100);?></td>
                <td style="border: 1px solid black;">
                    <form action="commentaires/see_comment.php" method="post" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $comment->id ?>">
                        <button type="submit">accepter</button>
                    </form>
                    <form action="commentaires/delete_comment.php" method="post" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $comment->id ?>">
                        <button type="submit">supprimer</button>
                    </form>
                <a href="#comment_<?= $comment->id?>" id="<?= $comment->id?>">détails</a>
                <div id="comment_<?= $comment->id?>">
                    <div>
                    <h4><?=$comment->title ?></h4>
                    <p>Commentaire posté par <strong><?= $comment->name." (".$comment->email.")</strong><br />Le ".date("d/m/Y à H:i",strtotime($comment->date)) ?></p>
                    <hr />
                    <p><?= nl2br($comment->comment) ?></p>
                    </div>
                    <div>
                        <a href="#" id="<?= $comment->id?>">accepter</a>
                        <a href="#" id="<?= $comment->id?>">supprimer</a>
                    </div>
                </div>
                </td>
                </tr>
                <?php
            }
        }else{
            ?>
            <tr>
                <td></td>
                <td>Aucun commentaire à valider</td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<pre>
<?php

var_dump($_SESSION);

?>
</pre>