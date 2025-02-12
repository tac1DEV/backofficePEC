<?php

function get_posts(){
    
    global $db;
    
    $req = $db->query("
        SELECT posts.id,
                posts.title,
                posts.image,
                posts.date,
                posts.content,
                admins.name
        FROM posts
        JOIN admins
        ON posts.writer = admins.email
        WHERE posts.id = '{$_GET['id']}'
    ");

    $results = $req->fetchObject();
    return $results;
}

function comment($name, $email, $comment){
    
    global $db;
    
    $c = array(
        'name' => $name,
        'email' => $email,
        'comment' => $comment,
        'post_id' => $_GET['id']
    );

    $sql = "INSERT INTO comments (name, email, comment, post_id, date) VALUES (:name, :email, :comment, :post_id, NOW())";
    $req = $db->prepare($sql);
    $req->execute($c);
}

?>