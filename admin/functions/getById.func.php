<?php

function get_post(){
    global $db;

    $req = $db->query("
    SELECT posts.id,
            posts.title,
            posts.image,
            posts.date,
            posts.content,
            posts.posted,
            admins.name
    FROM posts
    JOIN admins
    ON posts.writer = admins.email
    WHERE posts.id = '{$_GET['id']}'
");

    $results =  $req->fetchObject();
    
    return $results;
}