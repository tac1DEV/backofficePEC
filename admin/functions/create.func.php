<?php

function post($title, $content, $posted){
    global $db;
    $p = [
        'title' => $title,
        'content' => $content,
        'writer' => $_SESSION['admin'],
        'posted' => $posted
    ];

    $sql = "INSERT INTO posts(title, content, writer,date, posted) VALUES(:title, :content, :writer,NOW(), :posted)";

    $req = $db->prepare($sql);
    $req->execute($p);
    $id = $db->lastInsertId();
    header("Location: index.php?page=post&id=".$id);
}	

?>